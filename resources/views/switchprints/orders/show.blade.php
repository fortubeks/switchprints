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
          <a class="new-order2">Orders</a>
          <div class="order-3296-2-container">
            <img class="order-3296-2-icon1" loading="lazy" src="{{ asset('switchprints') }}/public/user3296-2.svg"/>
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-customer-container row">
                <div class="select-a-customer col-md-10">{{ isset($order) ? 'Edit Order' : 'Create Order' }}</div>
                <!-- <div class="col-md-2">
                    <a href="{{route('orders.create')}}" class="create-new-order"> <i class="bi bi-person-add"></i>New Staff</a>
                </div> -->
              </div>
              <div class="email-container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <form action="{{ isset($order) ? route('orders.update', $order->id) : route('orders.store') }}" method="POST">
                                    @csrf
                                    @if(isset($order))
                                        @method('PUT')
                                    @endif

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                          <label for="phone">Due Date</label>
                                          <input type="text" value="{{$order->expected_delivery_date}}" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                          <label for="phone">Status</label>
                                            @if ($order->status == 'Complete')
                                            <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                <i class="bx bxs-circle me-1"></i>COMPLETE
                                            </div>
                                            @elseif ($order->status == 'In Progress')
                                                <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                    <i class="bx bxs-circle me-1"></i>IN PROGRESS
                                                </div>
                                            @elseif ($order->status == 'Pending')
                                            <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                                <i class="bx bxs-circle me-1"></i>PENDING
                                            </div>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="cname">Name</label>
                                            <input type="text" name="customer_name" class="form-control" id="cname" value="{{ old('customer_name', $order->customer->name ?? '') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="phone"  value="{{ old('customer_phone', $order->customer->phone ?? '') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="address">Address</label>
                                            <input type="text" name="customer_address" class="form-control" id="address"  value="{{ old('customer_address', $order->customer->address ?? '') }}">
                                        </div>
                                    </div>
                                    @foreach($order->jobs as $job)
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <label for="branch_id">Design</label>
                                            <input type="text" value="{{$job->design->name}}" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="branch_id">Machine</label>
                                            <input type="text" value="{{$job->machine->name}}" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total_amount">Amount</label>
                                            <input type="text" value="{{$job->design->price}}" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="">Estimated Date </label>
                                            <input type="text" readonly value="{{$job->expected_delivery_date}}" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="">Status </label>
                                            <select name="status" id="status" data-job-id="{{ $job->id }}"  class="form-select status-change" >
                                            @foreach(\App\Enums\OrderStatus::cases() as $key => $status)
                                            <option value="{{ $status->value }}" {{ $job->status == $status->value ? 'selected' : '' }}>{{ $status->value }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="branch_id">Order Date</label>
                                            <input type="text" value="{{$order->expected_delivery_date}}" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    @if(isset($order))
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteOrderModal" class="btn btn-danger radius-30 mt-2 mt-lg-0"><i class="lni lni-trash"></i>Delete Order</a>
                                    @endif
                                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Go back</a>
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
 @if(isset($order))
<div class="modal fade" id="deleteOrderModal" tabindex="-1" aria-labelledby="deleteBarOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCartModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this order?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="POST" id="order-form" action="{{url('orders/'.$order->id)}}">
          @csrf @method('delete')
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
<script>
  window.addEventListener('load', function() {
    $('.status-change').on('change', function() {
        var jobId = $(this).data('job-id');
        var status = $(this).val();

        // Send AJAX request to update job status
        $.ajax({
        url: "{{ route('job.updateStatus') }}", // Replace with your route
        type: "POST",
        data: {
            _token: '{{ csrf_token() }}',
            job_id: jobId,
            status: status
        },
        success: function(response) {
            // Handle successful update (e.g., display success message)
            //change span colour
            //console.log(response); // For debugging
        },
        error: function(xhr, status, error) {
            // Handle AJAX errors (e.g., display error message)
            console.error(xhr, status, error);
        }
        });
    });

    });
        
        
    </script>