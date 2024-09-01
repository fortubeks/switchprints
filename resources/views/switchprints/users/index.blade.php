@extends('switchprints.layouts.app')

<style>
    .user-photo {
        width: 40px;
        height: auto;
    }

    .scrollable-table-container {
        overflow-x: auto;
        max-width: 100%;
        width: 100%;
    }
</style>
<style>
    .small-font {
        font-size: smaller;
        color: gray; /* Example styling */
    }
td{
    vertical-align: middle;
}
</style>
@section('contents')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('users.create') }}" class="btn btn-dark">Add New</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive scrollable-table-container">
                    <table id="users-table" class="table mb-0 table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone </th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                            <tbody>
                                @foreach ($users as $user)
                                    @php
                                        $userStatus = $user->is_active;
                                        $userStatusColor = $userStatus == '1' ? 'text-success' : 'text-danger';
                                    @endphp
                                    <tr>
                                        <td>
                                            @if (!empty($user->photo))
                                                <img class="img-fluid user-photo" src="{{ asset('storage/' . $user->photo) }}"
                                                    alt="">
                                            @else
                                            <i class="fadeIn animated bx bx-user"></i>
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td><span class="small-font">{{ $user->email }}</span></td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ removeUnderscoreAndCapitalise($user->role) }}</td>
                                        <td class="{{ $userStatusColor }}">{{ getStatusAsString($user->is_active) }}</td>
                                        <td><span class="small-font text-secondary">{{ $user->last_login ?? 'N/A' }}</span></td>
                                        <td>
                                            @if (auth()->user()->role === 'Hotel_Owner')
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('users.edit', $user->id) }}"><i
                                                            class='bx bxs-edit'></i></a>
                                                    @if ($user->deleted_at)
                                                        <a href="#"
                                                            onclick="confirmAction(event, '{{ $user->id }}', 'restore', 'Are you sure you want to restore this user?');"
                                                            class="ms-3">
                                                            <i class="fadeIn animated bx bx-git-pull-request"></i>
                                                        </a>
                                                    @else
                                                        <a href="#"
                                                            onclick="confirmAction(event, '{{ $user->id }}', 'delete', 'Are you sure you want to delete this user?');"
                                                            class="ms-3">
                                                            <i class='bx bxs-trash'></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            @else
                                                @if ($user->role === 'Hotel_Owner')
                                                    You Can't Edit This
                                                @else
                                                    <div class="d-flex order-actions">
                                                        <a href="{{ route('users.edit', $user->id) }}"><i
                                                                class='bx bxs-edit'></i></a>
                                                        @if ($user->deleted_at)
                                                            <a href="#"
                                                                onclick="confirmAction(event, '{{ $user->id }}', 'restore', 'Are you sure you want to restore this user?');"
                                                                class="ms-3">
                                                                <i class="fadeIn animated bx bx-git-pull-request"></i>
                                                            </a>
                                                        @else
                                                            <a href="#"
                                                                onclick="confirmAction(event, '{{ $user->id }}', 'delete', 'Are you sure you want to delete this user?');"
                                                                class="ms-3">
                                                                <i class='bx bxs-trash'></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endif

                                            <form id="restore-form-{{ $user->id }}"
                                                action="{{ route('users.restore', $user->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('PATCH')
                                            </form>

                                            <form id="delete-form-{{ $user->id }}"
                                                action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    </div>
@endsection

<script>
    function confirmAction(event, userId, action, message) {
        event.preventDefault();
        const confirmationModal = document.getElementById('confirmationModal' + userId);
        const modalMessage = confirmationModal.querySelector('#confirmationMessage' + userId);
        const confirmButton = confirmationModal.querySelector('#confirmActionBtn' + userId);

        // Set the confirmation message based on the action
        if (action === 'delete') {
            modalMessage.textContent = message || 'Are you sure you want to delete this user?';
            confirmButton.textContent = 'Yes, Delete';
            confirmButton.classList.add('btn-danger');
            confirmButton.addEventListener('click', function() {
                document.getElementById('delete-form-' + userId).submit();
            });
        } else if (action === 'restore') {
            modalMessage.textContent = message || 'Are you sure you want to restore this user?';
            confirmButton.textContent = 'Yes, Restore';
            confirmButton.classList.add('btn-primary');
            confirmButton.addEventListener('click', function() {
                document.getElementById('restore-form-' + userId).submit();
            });
        }

        const modal = new bootstrap.Modal(confirmationModal);
        modal.show();
    }
</script>

<script>
    window.addEventListener('load', function() {
        var user_table = $('#users-table').DataTable( {
            lengthChange: false,
            } );
            user_table.buttons().container().appendTo( '#users-table_wrapper .col-md-6:eq(0)' );
    });
</script>
