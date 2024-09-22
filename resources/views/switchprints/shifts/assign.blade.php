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
          <a class="new-order2">Users</a>
          <div class="user-3296-2-container">
            <img class="user-3296-2-icon1" loading="lazy" src="{{ asset('switchprints') }}/public/user3296-2.svg"/>
          </div>
        </header>
        <section class="order-details-container-wrapper">
          <div class="order-details-container">
            
            <div class="email-list">
              <div class="select-customer-container row">
                <div class="select-a-customer col-md-10">Assign Shifts</div>
                <!-- <div class="col-md-2">
                    <a href="{{route('users.create')}}" class="create-new-customer"> <i class="bi bi-person-add"></i>New Staff</a>
                </div> -->
              </div>
              <div class="email-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('shifts.assign') }}" method="POST">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <label for="user_id">Select User:</label>
                                            <select name="user_id" id="user_id" class="form-control form-select" required>
                                                @foreach(getModelList('users') as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="shift_id">Select Shift:</label>
                                            <select name="shift_id" id="shift_id" class="form-control form-select" required>
                                                @foreach(getModelList('shifts') as $shift)
                                                    <option value="{{ $shift->id }}">{{ $shift->name }} ({{ $shift->start_time }} - {{ $shift->end_time }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="date_range">Select Date Range:</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="shift_id">Select Machine:</label>
                                            <select name="machine_id" id="machine_id" class="form-control form-select" required>
                                                @foreach(getModelList('machines') as $machine)
                                                    <option value="{{ $machine->id }}">{{ $machine->name }} ({{ $machine->stitches_per_shift }} - shift)</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Assign Shifts</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="shift-data-table" class="table mb-0 table-hover items_list">
                                        <thead class="table-light">
                                            <tr>
                                                <th>User</th>
                                                <th>Shift</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse(getModelList('assigned-shifts') as $assignedShift)
                                            <tr>
                                                <td>{{ $assignedShift->user->name }}</td>
                                                <td>{{ $assignedShift->shift->name }} ({{ $assignedShift->shift->start_time }} - {{ $assignedShift->shift->end_time }})</td>
                                                <td>{{ $assignedShift->date }}</td>
                                                <td>
                                                    <form action="{{ route('shifts.remove', $assignedShift->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3">No shifts</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
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
