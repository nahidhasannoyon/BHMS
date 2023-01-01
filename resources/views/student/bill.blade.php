@extends('student.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h3 class="text-info text-center pd-10"><u>Monthly Bills</u></h3>
                    <table class="table table-striped data-table-export">
                        <thead>
                            <tr>
                                <th>Month - Year</th>
                                <th>Hostel Bill</th>
                                <th>Total Meal Bill</th>
                                <th>Other Bills</th>
                                <th>Total Bill</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dates as $date)
                                <tr>
                                    @php
                                        $total_meal_bill = App\Models\BookedMeal::where('user_type', 'student')
                                            ->where('user_id', auth('student')->user()->student_id)
                                            ->whereMonth('date', $date->month)
                                            ->whereYear('date', $date->year)
                                            ->sum('total');
                                        $other_bills = App\Models\MonthlyBill::where('student_id', auth('student')->user()->student_id)
                                            ->whereMonth('date', $date->month)
                                            ->whereYear('date', $date->year)
                                            ->sum('amount');
                                    @endphp
                                    <td>{{ Carbon::parse($date->year . '-' . $date->month)->format('M Y') }}</td>
                                    <th> - </th>
                                    <th>{{ $total_meal_bill . '/-' }}
                                    </th>
                                    <th> {{ $other_bills . '/-' }}
                                    </th>
                                    <th> {{ $total_meal_bill + $other_bills . '/-' }} </th>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
