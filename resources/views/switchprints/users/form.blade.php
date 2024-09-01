@extends('switchprints.layouts.app')

@section('contents')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Users</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{route('users.index')}}" class="btn btn-dark">View Users</a>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">

                <div class="card">
                    <div class="card-header">
                        {{ isset($user) ? 'Edit User' : 'Create User' }}
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                            @csrf
                            @if(isset($user))
                                @method('PUT')
                            @endif

                            <!-- First Name -->
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" required>
                            </div>

                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" required>
                            </div>

                            <!-- Gender -->
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="male" {{ (old('gender', $user->gender ?? '') == 'male') ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ (old('gender', $user->gender ?? '') == 'female') ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <!-- Phone -->
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}" required>
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address ?? '') }}" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
                            </div>

                            <!-- Role ID -->
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-select form-control" id="role" data-role="{{ old('role_id', $user->role_id ?? '') }}" name="role_id" required>
                                    <option value="">--Select--</option>
                                    <option value="3">Staff</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>

                            <!-- Branch ID -->
                            <div class="form-group">
                                <label for="branch">Branch</label>
                                <select class="form-select form-control" id="branch" data-role="{{ old('branch_id', $user->branch_id ?? '') }}" name="branch_id" required>
                                    <option value="">--Select--</option>
                                    <option value="3">Branch A</option>
                                    <option value="2">Branch B</option>
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" {{ isset($user) ? '' : 'required' }}>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Create' }}</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!--end row-->
    </div>
@endsection
