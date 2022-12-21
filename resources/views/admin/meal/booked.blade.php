@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.meal.search') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <h4 class="p-2 text-center">Select Date:</h4>
                                {{-- <label for="">Select a Date:</label> --}}
                                <input type="date" class="form-control" name="selectedDate"
                                    value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success float-right"><i class="fa fa-indent"
                                        aria-hidden="true"></i> Find</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (Request::routeIs('admin.meal.search'))
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h3 class="text-info text-center pd-10"><u>Meal of
                            {{ Carbon::parse($selectedDate)->format('d/m/Y') }}</u></h3>
                    <h5 class="text-secondary text-center pd-5"></h5>

                    <table class="table hover data-table-export nowrap">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Breafast<br>Quantity</th>
                                <th>Lunch<br>Quantity</th>
                                <th>Dinner<br>Quantity</th>
                                {{-- <th>Status</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meals as $item)
                                <tr>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->breakfast }}</td>
                                    <td>{{ $item->lunch }}</td>
                                    <td>{{ $item->dinner }}</td>
                                    {{-- <td>
                                    @if ($item->status == 0)
                                        <a href="{{ url('booked-meal/status/1') }}/{{ $item->id }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-ban"></i></a>
                                    @elseif($item->status == 1)
                                        <a href="{{ url('booked-meal/status/0') }}/{{ $item->id }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    @endif
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-center text-white bg-secondary pd-5">Total <i class="icon-copy fa fa-mail-forward"
                            aria-hidden="true"></i> Breakfast: {{ $total_breakfast }} Lunch: {{ $total_lunch }} Dinner:
                        {{ $total_dinner }}</p>
                </div>
            </div>
        </div>
    @else
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h3 class="text-info text-center pd-10"><u>Today's Meal</u></h3>
                    <h5 class="text-secondary text-center pd-5">Date:{{ Carbon\Carbon::now()->format('d/m/Y') }}</h5>

                    <table class="table hover data-table-export nowrap">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Breafast<br>Quantity</th>
                                <th>Lunch<br>Quantity</th>
                                <th>Dinner<br>Quantity</th>
                                {{-- <th>Status</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meals as $item)
                                <tr>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->breakfast }}</td>
                                    <td>{{ $item->lunch }}</td>
                                    <td>{{ $item->dinner }}</td>
                                    {{-- <td>
                                    @if ($item->status == 0)
                                        <a href="{{ url('booked-meal/status/1') }}/{{ $item->id }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-ban"></i></a>
                                    @elseif($item->status == 1)
                                        <a href="{{ url('booked-meal/status/0') }}/{{ $item->id }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    @endif
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-center text-white bg-secondary pd-5">Total <i class="icon-copy fa fa-mail-forward"
                            aria-hidden="true"></i> Breakfast: {{ $total_breakfast }} Lunch: {{ $total_lunch }} Dinner:
                        {{ $total_dinner }}</p>
                </div>
            </div>
        </div>
    @endif

@endsection
