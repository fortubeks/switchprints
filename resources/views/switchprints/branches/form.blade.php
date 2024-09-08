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
          <a class="new-order2">Branches</a>
          <div class="branch-3296-2-container">
            <img class="branch-3296-2-icon1" loading="lazy" src="{{ asset('switchprints') }}/public/user3296-2.svg"/>
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-customer-container row">
                <div class="select-a-customer col-md-10">{{ isset($branch) ? 'Edit Branch' : 'Create Branch' }}</div>
                <!-- <div class="col-md-2">
                    <a href="{{route('branches.create')}}" class="create-new-customer"> <i class="bi bi-person-add"></i>New Staff</a>
                </div> -->
              </div>
              <div class="email-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ isset($branch) ? route('branches.update', $branch->id) : route('branches.store') }}" method="POST">
                                    @csrf
                                    @if(isset($branch))
                                        @method('PUT')
                                    @endif

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="name"> Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $branch->name ?? '') }}" required>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">{{ isset($branch) ? 'Update' : 'Create' }}</button>
                                    <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancel</a>
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
