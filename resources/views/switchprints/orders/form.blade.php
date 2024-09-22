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
                                          <label for="phone">Search Existing Customer</label>
                                          <input type="hidden" id="customer_id" name="customer_id">
                                          <input id="customer_name" autofocus type="text" list="customers"
                                              class="form-control" oninput="setCustomerInformation()"
                                              placeholder="Search Customer by Name">
                                        </div>
                                        <datalist id="customers">
                                            @foreach (getModelList('customers') as $customer)
                                                <option data-id="{{ $customer->id }}" value="{{ $customer->name }}">
                                            @endforeach
                                        </datalist>
                                        
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
                                    <!-- First Order Row -->
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <label for="branch_id">Design</label>
                                            <select class="form-control form-select design-select"  name="design_id[]">
                                                <option value="">--Select Design--</option>
                                                @foreach(getModelList('designs') as $design)
                                                <option value="{{$design->id}}" {{ (old('design_id', $order->design_id ?? '') == $design->name) ? 'selected' : '' }} data-amount="{{$design->price}}">{{$design->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="branch_id">Machine</label>
                                            <select class="form-control form-select machine-select" name="machine_id[]">
                                                <option value="">--Select Machine--</option>
                                                @foreach(getModelList('machines') as $machine)
                                                <option value="{{$machine->id}}" {{ (old('design_id', $order->machine_id ?? '') == $machine->name) ? 'selected' : '' }}>{{$machine->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total_amount">Amount</label>
                                            <input type="text" name="amount[]" readonly class="form-control total-amount">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="">Estimated Date: </label>
                                            <input type="text" readonly name="expected_job_delivery_date[]" class="form-control edd-label">
                                        </div>
                                    </div>

                                    <!-- Sample row (hidden) -->
                                    <div id="row-container"></div>
                                    <div class="row mb-4 d-none sample-row" id="sample-row">
                                        <div class="col-md-3">
                                            <label for="branch_id">Design</label>
                                            <select class="form-control form-select design-select" data-name="design_id[]">
                                                <option value="">--Select Design--</option>
                                                @foreach(getModelList('designs') as $design)
                                                <option value="{{$design->id}}" data-amount="{{$design->price}}">{{$design->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="branch_id">Machine</label>
                                            <select class="form-control form-select machine-select" data-name="machine_id[]">
                                                <option value="">--Select Machine--</option>
                                                @foreach(getModelList('machines') as $machine)
                                                <option value="{{$machine->id}}">{{$machine->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total_amount">Amount</label>
                                            <input type="text" readonly name="amount[]" class="form-control total-amount">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="">Estimated Date: </label>
                                            <input type="text" readonly name="expected_job_delivery_date[]" class="form-control edd-label">
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-danger remove-row mt-3">Remove</button>
                                        </div>
                                        
                                    </div>

                                    <!-- Add and Remove Buttons -->
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-success" id="add-row">Add Row</button>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="branch_id">Order Date</label>
                                            <input name="order_date" type="date" value="{{now()}}" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">{{ isset($order) ? 'Update' : 'Create' }}</button>
                                    @if(isset($order))
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteOrderModal" class="btn btn-danger radius-30 mt-2 mt-lg-0"><i class="lni lni-trash"></i>Delete Order</a>
                                    @endif
                                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
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
    document.querySelector('form').addEventListener('submit', function(e) {
    // Disable the fields in the sample row so they won't be submitted
        document.querySelectorAll('.sample-row input, .sample-row select').forEach(function(el) {
            el.setAttribute('disabled', 'disabled');
        });
    });
    // Update the total amount and possibly the estimated date based on the selected design
    $(document).on('change', '.design-select', function() {
        var selectedDesign = $(this).find('option:selected').val(); // Get the selected design value
        var amount = $(this).find('option:selected').data('amount'); // Get the amount from the selected option

        // Find the corresponding amount input and update its value
        $(this).closest('.row').find('.total-amount').val(amount);

        var selectedMachine = $(this).closest('.row').find('.machine-select').val();
        var edd = 'N/A';

        if(selectedDesign !== '' && selectedMachine !== ''){
            // Call the calculateEdd function and handle the result inside
            calculateEdd(selectedDesign, selectedMachine, $(this).closest('.row').find('.edd-label'));
        }
    });

    // Update the estimated date based on the selected machine
    $(document).on('change', '.machine-select', function() {
        var selectedMachine = $(this).find('option:selected').val(); // Get the selected machine value
        var selectedDesign = $(this).closest('.row').find('.design-select').val();
        var edd = 'N/A';

        if(selectedDesign !== '' && selectedMachine !== ''){
            // Call the calculateEdd function and handle the result inside
            calculateEdd(selectedDesign, selectedMachine, $(this).closest('.row').find('.edd-label'));
        }
    });

    function calculateEdd(designId, machineId, $eddLabel){
        $.ajax({
            url: "{{ url('get-edd') }}", // Replace with your controller route
            method: 'GET',
            data: {
                designId: designId,
                machineId: machineId
            },
            success: function(response) {
                // Update the EDD label on success
                $eddLabel.val(response.edd); // Assuming response contains the EDD
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
                $eddLabel.val('N/A'); // Set as 'N/A' if there's an error
            }
        });
    }

    // Add new row
    $('#add-row').click(function() {
        // Clone the sample row
        var newRow = $('#sample-row').clone().removeClass('d-none sample-row').removeAttr('id');
        
        // Assign name attributes to the cloned inputs
        newRow.find('select, input').each(function() {
            $(this).attr('name', $(this).data('name'));
        });

        // Append the new row to the container
        $('#row-container').append(newRow);
    });

    // Remove row
    $(document).on('click', '.remove-row', function() {
        $(this).closest('.row').remove();
    });

    });
        function setCustomerInformation() {
            var value = $('#customer_name').val();
            var customerId = $('#customers [value="' + value + '"]').data('id');

            if (customerId) {
                $('#customer_id').val(customerId);
                $.ajax({
                    url: "{{ url('get-customer-info') }}", // Replace with your controller route
                    method: 'GET', // or 'GET', depending on your controller route
                    data: {
                        id: customerId // Send the value to the controller
                    },
                    success: function(response) {
                        // Handle success response
                        //populate guest information in all the text boxes
                        var customer = JSON.parse(response);

                        $('#cname').val(customer.name);
                        $('#phone').val(customer.phone);
                        $('#address').val(customer.address);

                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            }
        }
        
    </script>