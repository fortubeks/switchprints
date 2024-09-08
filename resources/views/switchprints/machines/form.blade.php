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
          <a class="new-order2">Machines</a>
          <div class="machine-3296-2-container">
            <img class="machine-3296-2-icon1" loading="lazy" src="{{ asset('switchprints') }}/public/user3296-2.svg"/>
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-customer-container row">
                <div class="select-a-customer col-md-10">{{ isset($machine) ? 'Edit Machine' : 'Create Machine' }}</div>
                <!-- <div class="col-md-2">
                    <a href="{{route('machines.create')}}" class="create-new-customer"> <i class="bi bi-person-add"></i>New Staff</a>
                </div> -->
              </div>
              <div class="email-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ isset($machine) ? route('machines.update', $machine->id) : route('machines.store') }}" method="POST">
                                    @csrf
                                    @if(isset($machine))
                                        @method('PUT')
                                    @endif

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="name"> Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $machine->name ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="stitches_per_hour">Stitches</label>
                                            <input type="number" class="form-control" id="stitches_per_hour" name="stitches_per_hour" value="{{ old('stitches_per_hour', $machine->stitches_per_hour ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="branch">Branch</label>
                                            <select class="form-control form-select" name="branch_id">
                                            @foreach(getModelList('branches') as $branch)
                                              <option value="{{$branch->id}}" {{ (old('branch_id', $user->branch_id ?? '') == $branch->name) ? 'selected' : '' }}>{{$branch->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">{{ isset($machine) ? 'Update' : 'Create' }}</button>
                                    <a href="{{ route('machines.index') }}" class="btn btn-secondary">Cancel</a>
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
