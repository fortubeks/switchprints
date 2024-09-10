@extends('switchprints.layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('switchprints') }}/css/dashboard.css" />
  <link rel="stylesheet" href="{{ asset('switchprints') }}/css/users.css" />
@endpush
@section('content')

<div class="dashboard">
@include('switchprints.layouts.navigation')
<div class="div23">1</div>
<div class="div24">2</div>
<div class="div25">3</div>
<div class="heading"></div>
<main class="new-order-form">
        <header class="new-order-parent">
          <a class="new-order2">Dashboard</a>
          <div class="customer-3296-2-container">
            <img class="customer-3296-2-icon1" loading="lazy" src="{{ asset('switchprints') }}/public/user3296-2.svg"/>
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-customer-container row">
                <div class="select-a-customer col-md-10">Orders</div>
                <div class="col-md-2">
                    <a href="{{route('orders.create')}}" class="create-new-customer"> <i class="bi bi-person-add"></i>New Order</a>
                </div>
              </div>
              <div class="email-container">
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
                            @forelse ($orders as $order)
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
        </section>
      </main>
    </div>
<!-- Content end --> 
@endsection
<script>
    window.addEventListener('load', function() {
        var users_table = $('#orders-data-table').DataTable( {
            lengthChange: false,
        } );

        $('.item').on('click', function(){
            // Get the URL from the data-url attribute
            var url = $(this).data('url');
            // Redirect to the specified URL
            window.location.href = url;
        });

    });

</script>