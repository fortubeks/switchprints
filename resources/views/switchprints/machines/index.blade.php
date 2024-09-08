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
          <div class="machine-3296-2-container">
            <img
              class="machine-3296-2-icon1"
              loading="lazy"
              alt=""
              src="{{ asset('switchprints') }}/public/user3296-2.svg"
            />
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-customer-container row">
                <div class="select-a-customer col-md-10">Machines</div>
                <div class="col-md-2">
                    <a href="{{route('machines.create')}}" class="create-new-customer"> <i class="bi bi-person-add"></i>New Machine</a>
                </div>
              </div>
              <div class="email-container">
                <div class="table-responsive">
                    <table id="machines-data-table" class="table mb-0 table-hover items_list">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Stitches</th>
                                <th>Last Service</th>
                                <th>Next Service</th>
                                <th>Branch</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($machines as $machine)
                                <tr class="clickable item" data-url="{{ route('machines.show', $machine->id) }}">
                                    <td>{{ $machine->name }}</td>
                                    <td>{{ $machine->stitches_per_hour }}</td>
                                    <td>{{ $machine->dateOfLastService() }}</td>
                                    <td>{{ $machine->dateOfNextService() }}</td>
                                    <td>{{ $machine->branch->name }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">No machines</td>
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
        var users_table = $('#machines-data-table').DataTable( {
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