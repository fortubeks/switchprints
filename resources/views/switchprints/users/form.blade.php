@extends('switchprints.layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('switchprints') }}/css/dashboard.css" />
  <link rel="stylesheet" href="{{ asset('switchprints') }}/css/users.css" />
@endpush
@section('content')
<div class="dashboard">
@include('switchprints.layouts.navigation')

<div class="heading"></div>
<main class="new-order-form">
        <header class="new-order-parent">
          <a class="new-order2">Users</a>
          <div class="user-3296-2-container">
            <img class="user-3296-2-icon1" loading="lazy" src="{{ asset('switchprints') }}/public/user3296-2.svg"/>
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-customer-container row">
                <div class="select-a-customer col-md-10">{{ isset($user) ? 'Edit User' : 'Create User' }}</div>
                <div class="col-md-2">
                    <a href="{{route('shifts.assign.view')}}" class="create-new-customer"> <i class="bi bi-person-add"></i>Assign Shifts</a>
                </div>
              </div>
              <div class="email-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                                    @csrf
                                    @if(isset($user))
                                        @method('PUT')
                                    @endif

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="name"> Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="gender">Gender</label>
                                            <select class="form-control form-select" id="gender" name="gender" required>
                                                <option value="male" {{ (old('gender', $user->gender ?? '') == 'male') ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ (old('gender', $user->gender ?? '') == 'female') ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="role_id">Role</label>
                                            <select class="form-control form-select" id="role_id" name="role_id" required>
                                                @foreach(getModelList('roles') as $role)
                                                <option value="{{$role->id}}" {{ (old('role_id', $user->role_id ?? '') == $role->name) ? 'selected' : '' }}>{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="branch_id">Branch</label>
                                            <select class="form-control form-select" id="branch_id" name="branch_id" required>
                                                @foreach(getModelList('branches') as $branch)
                                                <option value="{{$branch->id}}" {{ (old('branch_id', $user->branch_id ?? '') == $branch->name) ? 'selected' : '' }}>{{$branch->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address ?? '') }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" {{ isset($user) ? '' : 'required' }}>
                                        </div>
                                        <div class="col-md-4">
                                            @if(isset($user))
                                            <label for="machine_id">Machine</label>
                                            <select class="form-control form-select" id="machine_id" name="machine_id" required>
                                                @foreach(getModelList('machines') as $machine)
                                                <option value="{{$machine->id}}" {{ (old('machine_id', $user->machine_id ?? '') == $machine->id) ? 'selected' : '' }}>{{$machine->name}}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Create' }}</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
<!-- Content end --> 
@endsection
