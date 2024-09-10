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
          <a class="new-order2">Customers</a>
          <div class="customer-3296-2-container">
            <img class="customer-3296-2-icon1" loading="lazy" src="{{ asset('switchprints') }}/public/user3296-2.svg"/>
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-customer-container row">
                <div class="select-a-customer col-md-10">{{ isset($customer) ? 'Customer Details' : 'Create Customer' }}</div>
                <!-- <div class="col-md-2">
                    <a href="{{route('customers.create')}}" class="create-new-customer"> <i class="bi bi-person-add"></i>New Staff</a>
                </div> -->
              </div>
              <div class="email-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST">
                                    @csrf
                                    @if(isset($customer))
                                        @method('PUT')
                                    @endif

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="name"> Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $customer->name ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $customer->address ?? '') }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="branch_id">Branch</label>
                                            <select class="form-control form-select" id="branch_id" name="branch_id" required>
                                                @foreach(getModelList('branches') as $branch)
                                                <option value="{{$branch->id}}" {{ (old('branch_id', $customer->branch_id ?? '') == $branch->name) ? 'selected' : '' }}>{{$branch->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">{{ isset($customer) ? 'Update' : 'Create' }}</button>
                                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($customer))
                <div class="row">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="orders-data-table" class="table mb-0 table-hover items_list">
                            <thead class="table-light">
                                <tr>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Expected Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customer->orders as $order)
                                  <tr class="clickable item" data-url="{{ route('orders.show', $order->id) }}">
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ $order->expected_delivery_date }}</td>
                                    <td>{{ $order->status }}</td>
                                  </tr>
                                    
                                @empty
                                <tr>
                                    <td colspan="5">No orders</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
<!-- Content end --> 
@endsection
