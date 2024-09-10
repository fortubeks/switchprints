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
                                          <input id="customer_name" autofocus name="customer_name" type="text" list="customers"
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
                                            <input type="text" class="form-control" id="cname" value="{{ old('name', $order->customer->name ?? '') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone"  value="{{ old('phone', $order->customer->phone ?? '') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address"  value="{{ old('address', $order->customer->address ?? '') }}">
                                        </div>
                                    </div>
                                    <!-- First Order Row -->
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="branch_id">Style</label>
                                            <select class="form-control form-select style-select"  name="style_id[]">
                                                <option>--Select Style--</option>
                                                @foreach(getModelList('styles') as $style)
                                                <option value="{{$style->id}}" {{ (old('style_id', $order->style_id ?? '') == $style->name) ? 'selected' : '' }} data-amount="{{$style->price}}">{{$style->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="branch_id">Machine</label>
                                            <select class="form-control form-select" name="machine_id[]">
                                                @foreach(getModelList('machines') as $machine)
                                                <option value="{{$machine->id}}" {{ (old('style_id', $order->machine_id ?? '') == $machine->name) ? 'selected' : '' }}>{{$machine->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="total_amount">Amount</label>
                                            <input type="text" name="amount[]" readonly class="form-control total-amount">
                                        </div>
                                    </div>

                                    <!-- Sample row (hidden) -->
                                    <div id="row-container"></div>
                                    <div class="row mb-4 d-none sample-row" id="sample-row">
                                        <div class="col-md-4">
                                            <label for="branch_id">Style</label>
                                            <select class="form-control form-select style-select" data-name="style_id[]">
                                                <option>--Select Style--</option>
                                                @foreach(getModelList('styles') as $style)
                                                <option value="{{$style->id}}" data-amount="{{$style->price}}">{{$style->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="branch_id">Machine</label>
                                            <select class="form-control form-select" data-name="machine_id[]">
                                                @foreach(getModelList('machines') as $machine)
                                                <option value="{{$machine->id}}">{{$machine->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total_amount">Amount</label>
                                            <input type="text" readonly data-name="amount[]" class="form-control total-amount">
                                        </div>
                                        <div class="col-md-2">
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
                                            <label for="branch_id">Date</label>
                                            <input name="order_date" type="date" value="{{now()}}" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">{{ isset($order) ? 'Update' : 'Create' }}</button>
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
@endsection
<script>
  window.addEventListener('load', function() {
    document.querySelector('form').addEventListener('submit', function(e) {
    // Disable the fields in the sample row so they won't be submitted
        document.querySelectorAll('.sample-row input, .sample-row select').forEach(function(el) {
            el.setAttribute('disabled', 'disabled');
        });
    });
    // Update the total amount based on the selected style
    $(document).on('change', '.style-select', function() {
        var selectedOption = $(this).find('option:selected');
        var amount = selectedOption.data('amount'); // Get the amount from the selected option

        // Find the corresponding amount input and update its value
        $(this).closest('.row').find('.total-amount').val(amount);
    });

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