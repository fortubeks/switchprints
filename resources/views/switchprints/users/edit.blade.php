@extends('dashboard.layouts.app')

@section('contents')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Users</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{route('users.index')}}" class="btn btn-dark">View Users</a>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="card">
                <div class="card-header">
                <h5>Edit User</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="POST" class="row g-3">
                    @csrf @method('PUT')
                    <div class="row"> 
                        <div class="col-xl-8">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="input1" class="form-label">Full Name</label>
                                    <input type="text" name="name" required
                                        value="{{ old('name', $user->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="input1"
                                        placeholder="Full Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input3" class="form-label">Phone</label>
                                    <input type="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                        class="form-control @error('phone') is-invalid @enderror" id="input3"
                                        placeholder="Phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input4" class="form-label">Email</label>
                                    <input type="email" name="email" required value="{{ old('email', $user->email) }}"
                                        class="form-control @error('email') is-invalid @enderror" id="input4"
                                        placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input4" class="form-label">Photo</label>
                                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="input4">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if($user->photo)
                                        <div>
                                            <span>Current Photo:</span>
                                            <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo" style="max-width: 100px;">
                                            <input type="hidden" name="old_photo" value="{{ $user->photo }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                @if(auth()->id() == $user->id)
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input4" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select">
                                        <option selected value="Hotel_Owner">Hotel Owner</option>
                                    </select>
                                </div>
                                @else
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input4" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input4" class="form-label">Is Active</label>
                                    <select name="is_active" id="is_active" required
                                        class="form-select @error('is_active') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        @foreach ($statusOptions as $key => $status)
                                        <option value="{{ $key }}"{{ $user->is_active == $key ? 'Selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('is_active')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                                    <label for="input4" class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ old('address', $user->address) }}"
                                        class="form-control @error('address') is-invalid @enderror" id="input4">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <div class="col-xl-4">
    <h6>Select Roles</h6>
    <div class="align-items-center gap-3">
        @foreach(getModelList('roles') as $role)
            <div class="form-check form-check-success">
                <input class="form-check-input" type="checkbox" id="role_{{ $role->id }}" name="role_ids[]" value="{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="role_{{ $role->id }}">
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>   

                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
@endsection
