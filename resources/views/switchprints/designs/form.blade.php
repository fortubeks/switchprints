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
          <a class="new-order2">Design</a>
          <div class="style-3296-2-container">
            <img class="style-3296-2-icon1" loading="lazy" src="{{ asset('switchprints') }}/public/user3296-2.svg"/>
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-customer-container row">
                <div class="select-a-customer col-md-10">{{ isset($design) ? 'Edit Design' : 'Create Design' }}</div>
                <!-- <div class="col-md-2">
                    <a href="{{route('designs.create')}}" class="create-new-customer"> <i class="bi bi-person-add"></i>New Staff</a>
                </div> -->
              </div>
              <div class="email-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ isset($design) ? route('designs.update', $design->id) : route('designs.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($design))
                                        @method('PUT')
                                    @endif

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label for="name"> Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $design->name ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="stitches">Stitches</label>
                                            <input type="number" class="form-control" id="stitches" name="stitches" value="{{ old('stitches', $design->stitches ?? '') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                          <label for="price">Price</label>
                                          <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $design->price ?? '') }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                          <label for="price">Image</label>
                                          <input type="file" class="form-control" name="image" >
                                        </div>
                                        <div class="col-md-4">
                                          <label for="price">DST</label>
                                          <input type="file" class="form-control" name="dst" >
                                        </div>
                                    </div>
                                    @if(isset($design))
                                    <div class="col-md-12 mb-4">
                                      <?php $url =  asset('storage/'.$design->image); ?>
                                      <a href="{{ $url }}" target="_blank" onclick="window.open('{{ $url }}', 'popup'); return false;">
                                      <img class="img-thumbnail" width="200px" design="margin-right: 20px;" src="{{ $url }}"/> </a>
                                    </div>
                                    @endif
                                    @if(isset($design->dst))
                                    <div class="col-md-12 mb-4">
                                      <?php $url =  asset('storage/'.$design->dst); ?>
                                      <a href="{{ $url }}" target="_blank" onclick="window.open('{{ $url }}', 'popup'); return false;">
                                      {{ $url }} </a>
                                    </div>
                                    @endif

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">{{ isset($design) ? 'Update' : 'Create' }}</button>
                                    <a href="{{ route('designs.index') }}" class="btn btn-secondary">Cancel</a>
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
