@extends('student.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('student.meal.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <h4 class="p-2 text-center">Select Date From:</h4>
                                {{-- <label for="">Select a Date:</label> --}}
                                <input type="date" class="form-control" name="fromDate"
                                    min="{{ Carbon::now()->addDays(1)->format('Y-m-d') }}"
                                    value="{{ Carbon::now()->addDays(1)->format('Y-m-d') }}" id="fromDate"
                                    onchange="myChangeFunction(this)">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <h4 class="p-2 text-center">Select Date To:</h4>
                                {{-- <label for="">Select a Date:</label> --}}
                                <input type="date" class="form-control" name="toDate"
                                    min="{{ Carbon::now()->addDays(1)->format('Y-m-d') }}"
                                    value="{{ Carbon::now()->addDays(1)->format('Y-m-d') }}" id="toDate">
                            </div>
                            <div class="form-group col-lg-4 clo-md-4 col-sm-12">
                                <label for="breakfast">Breakfast</label>
                                <input type="checkbox" name="breakfast" id="breakfast">
                            </div>
                            <div class="form-group col-lg-4 clo-md-4 col-sm-12">
                                <label for="lunch">Lunch</label>
                                <input type="checkbox" name="lunch" id="lunch">
                            </div>
                            <div class="form-group col-lg-4 clo-md-4 col-sm-12">
                                <label for="dinner">Dinner</label>
                                <input type="checkbox" name="dinner" id="dinner">
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success float-right"><i class="fa fa-indent"
                                        aria-hidden="true"></i> Meal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h3 class="text-info text-center pd-10"><u>Booked Meals</u></h3>
                    <table class="table table-striped data-table-export">
                        <thead>
                            <tr>
                                <td rowspan="2">Date</td>
                                <th colspan="2">Breakfast</th>
                                <th colspan="2">Lunch</th>
                                <th colspan="2">Dinner</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>Item</td>
                                <td>Quantity</td>
                                <td>Item</td>
                                <td>Quantity</td>
                                <td>Item</td>
                                <td>Quantity</td>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($studentMeals as $item)
                                <tr>
                                    <td>{{ Carbon::parse($item->date)->format('d M Y') }}</td>
                                    @foreach ($meals as $meal)
                                        @php
                                            $thatDaysMeal = $meal
                                                ->where('day', Carbon::parse($item->date)->format('l'))
                                                ->where('meal_type', 'Breakfast')
                                                ->get();
                                        @endphp
                                        @foreach ($thatDaysMeal as $thatMeal)
                                            <td>{{ $thatMeal->meal_items }}</td>
                                        @endforeach
                                    @break;
                                @endforeach
                                <td>{{ $item->breakfast }}</td>
                                @foreach ($meals as $meal)
                                    @php
                                        $thatDaysMeal = $meal
                                            ->where('day', Carbon::parse($item->date)->format('l'))
                                            ->where('meal_type', 'Lunch')
                                            ->get();
                                    @endphp
                                    @foreach ($thatDaysMeal as $thatMeal)
                                        <td>{{ $thatMeal->meal_items }}</td>
                                    @endforeach
                                @break;
                            @endforeach
                            <td>{{ $item->lunch }}</td>
                            @foreach ($meals as $meal)
                                @php
                                    $thatDaysMeal = $meal
                                        ->where('day', Carbon::parse($item->date)->format('l'))
                                        ->where('meal_type', 'Dinner')
                                        ->get();
                                @endphp
                                @foreach ($thatDaysMeal as $thatMeal)
                                    <td>{{ $thatMeal->meal_items }}</td>
                                @endforeach
                            @break;
                        @endforeach
                        <td>{{ $item->dinner }}</td>
                        <td>
                            <a href="{{ route('student.meal.edit', $item->id) }}"
                                class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Edit"><i class="icon-copy dw dw-edit-1"></i></a>
                            <a href="{{ route('student.meal.delete', $item->id) }}"
                                class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Delete"
                                onclick="return confirm('Are you sure to delete this day meal?')"><i
                                    class="icon-copy dw dw-trash1"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    function myChangeFunction(input1) {
        var input2 = document.getElementById('toDate');
        input2.min = input1.value;
        input2.value = input1.value;
    }
</script>
@endpush
