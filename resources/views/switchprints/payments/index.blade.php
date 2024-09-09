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
          <div class="payment-3296-2-container">
            <img
              class="payment-3296-2-icon1"
              loading="lazy"
              alt=""
              src="{{ asset('switchprints') }}/public/user3296-2.svg"
            />
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-payment-container row">
                <div class="select-a-payment col-md-10">Payments</div>
                <div class="col-md-2">
                    <a href="{{route('payments.create')}}" class="create-new-payment"> <i class="bi bi-person-add"></i></a>
                </div>
              </div>
              <div class="email-container">
                <div class="table-responsive">
                    <table id="payments-data-table" class="table mb-0 table-hover items_list">
                        <thead class="table-light">
                            <tr>
                                <th></th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Mode of Payment</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr class="clickable item" data-url="{{ route('payments.show', $payment->id) }}">
                                    <td></td>
                                    <td>{{ $payment->order->customer->name }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->mode }}</td>
                                    <td>{{ $payment->payment_date }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">No payments</td>
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
        var users_table = $('#payments-data-table').DataTable( {
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