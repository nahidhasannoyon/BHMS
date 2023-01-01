@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.monthly_bill.show') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <h4 class="p-2 text-center">Select Date:</h4>
                                {{-- <label for="">Select a Date:</label> --}}
                                <input type="month" class="form-control" name="selectedDate"
                                    value="{{ empty($date) ? Carbon::now()->format('Y-m-d') : $date }}">
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success float-right"><i class="fa fa-search"
                                        aria-hidden="true"></i> Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (Request::routeIs('admin.monthly_bill.show'))
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h3 class="text-info text-center pd-10"><u>Bill of
                            {{ Carbon::parse($year . '-' . $month)->format('M Y') }}</u></h3>
                    <h5 class="text-secondary text-center pd-5"></h5>

                    <table class="table hover data-table-export nowrap">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>User Type</th>
                                <th>Hostel Bill</th>
                                <th>Total Meal Bill</th>
                                <th>Other Bills</th>
                                <th>Total Bill</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    @php
                                        $total_meal_bill = App\Models\BookedMeal::where('user_type', 'student')
                                            ->where('user_id', $student->student_id)
                                            ->whereMonth('date', $month)
                                            ->whereYear('date', $year)
                                            ->sum('total');
                                        $other_bills = App\Models\MonthlyBill::where('student_id', $student->student_id)
                                            ->whereMonth('date', $month)
                                            ->whereYear('date', $year)
                                            ->sum('amount');
                                    @endphp
                                    <th>{{ $student->student_id }}</th>
                                    <th> Student </th>
                                    <th> - </th>
                                    <th>{{ $total_meal_bill }}</th>
                                    <th>{{ $other_bills }}</th>
                                    <th> {{ $total_meal_bill + $other_bills }}</th>
                                </tr>
                            @endforeach
                            @foreach ($users as $user)
                                <tr>
                                    @php
                                        $total_meal_bill = App\Models\BookedMeal::where('user_type', 'admin')
                                            ->where('user_id', $user->employee_id)
                                            ->whereMonth('date', $month)
                                            ->whereYear('date', $year)
                                            ->sum('total');
                                    @endphp
                                    <th>{{ $user->employee_id }}</th>
                                    <th> Admin </th>
                                    <th> - </th>
                                    <th>{{ $total_meal_bill }}</th>
                                    <th> - </th>
                                    <th> {{ $total_meal_bill }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <p class="text-center text-white bg-secondary pd-5">Total <i class="icon-copy fa fa-mail-forward"
                            aria-hidden="true"></i> Breakfast: {{ $total_breakfast }} Lunch: {{ $total_lunch }} Dinner:
                        {{ $total_dinner }}</p> --}}
                </div>
            </div>
        </div>
    @endif
@endsection
