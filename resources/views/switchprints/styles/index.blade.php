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
          <div class="style-3296-2-container">
            <img
              class="style-3296-2-icon1"
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
                <div class="select-a-customer col-md-10">Styles</div>
                <div class="col-md-2">
                    <a href="{{route('styles.create')}}" class="create-new-customer"> <i class="bi bi-person-add"></i>New Style</a>
                </div>
              </div>
              <div class="email-container">
                <div class="table-responsive">
                    <table id="styles-data-table" class="table mb-0 table-hover items_list">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Stitches</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($styles as $style)
                                <tr class="clickable item" data-url="{{ route('styles.show', $style->id) }}">
                                    <td>{{ $style->name }}</td>
                                    <td>{{ $style->stitches }}</td>
                                    <td>{{ $style->price }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="3">No styles</td>
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
        var users_table = $('#styles-data-table').DataTable( {
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