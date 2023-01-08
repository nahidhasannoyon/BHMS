@extends('admin.layout.master')
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
                                <th>Total Meal Bill</th>
                                <th>Total Bill</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dates as $date)
                                <tr>
                                    @php
                                        $total_meal_bill = App\Models\BookedMeal::where('user_type', 'admin')
                                            ->where('user_id', auth()->user()->employee_id)
                                            ->whereMonth('date', $date->month)
                                            ->whereYear('date', $date->year)
                                            ->sum('total');
                                    @endphp
                                    <td>{{ Carbon::parse($date->year . '-' . $date->month)->format('M Y') }}</td>
                                    <th>{{ $total_meal_bill . '/-' }}
                                    </th>
                                    <th> {{ $total_meal_bill . '/-' }} </th>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
