@extends('student.layout.master')
@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> Meal Chart</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Meal Type</th>
                                    <th>Items</th>
                                    <th>Price</th>
                            </thead>
                            <tbody>
                                @foreach ($meals as $meal)
                                    <tr>
                                        <td>{{ $meal->day }}</td>
                                        <td>{{ $meal->meal_type }}</td>
                                        <td>{{ $meal->meal_items }}</td>
                                        <td>{{ $meal->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"> Meal Chart</h4>
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Day</th>
                                    <th>Breakfast</th>
                                    <th>Lunch</th>
                                    <th>Dinner</th>
                            </thead>
                            <tbody>

                                {{-- * Saturday --}}
                                <tr>
                                    <td rowspan="2">Saturday</td>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Saturday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Saturday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Saturday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Saturday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Saturday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Saturday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                </tr>

                                {{-- * Sunday --}}
                                <tr>
                                    <td rowspan="2">Sunday</td>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Sunday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Sunday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Sunday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Sunday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Sunday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Sunday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                </tr>

                                {{-- * Monday --}}
                                <tr>
                                    <td rowspan="2">Monday</td>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Monday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Monday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Monday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Monday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Monday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Monday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                </tr>

                                {{-- * Tuesday --}}
                                <tr>
                                    <td rowspan="2">Tuesday</td>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Tuesday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Tuesday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Tuesday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Tuesday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Tuesday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Tuesday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                </tr>

                                {{-- * Wednesday --}}
                                <tr>
                                    <td rowspan="2">Wednesday</td>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Wednesday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Wednesday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Wednesday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Wednesday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Wednesday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Wednesday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                </tr>

                                {{-- * Thursday --}}
                                <tr>
                                    <td rowspan="2">Thursday</td>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Thursday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Thursday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Thursday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Thursday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Thursday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Thursday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                </tr>

                                {{-- * Friday --}}
                                <tr>
                                    <td rowspan="2">Friday</td>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Friday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Friday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Friday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->meal_items }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Friday' && $meal->meal_type == 'Breakfast')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Friday' && $meal->meal_type == 'Lunch')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($meals as $meal)
                                        @if ($meal->day == 'Friday' && $meal->meal_type == 'Dinner')
                                            <td> {{ $meal->price }}</td>
                                        @endif
                                    @endforeach
                                </tr>

                            </tbody>

                            {{-- <tbody>
                                @foreach ($meals as $meal)
                                    <tr>
                                        <td>{{ $meal->day }}</td>
                                        <td>{{ $meal->meal_type }}</td>
                                        <td>{{ $meal->meal_items }}</td>
                                        <td>{{ $meal->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
