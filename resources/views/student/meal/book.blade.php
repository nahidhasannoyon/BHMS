@extends('student.layout.master')
@section('content')
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('student.meal.find') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <h4 class="p-2 text-center">Select a Date:</h4>
                                {{-- <label for="">Select a Date:</label> --}}
                                <input type="date" class="form-control" name="date"
                                    min="{{ Carbon\Carbon::now()->addDays(1)->format('Y-m-d') }}" {{-- todo remove below comment line --}}
                                    {{-- max="{{ Carbon\Carbon::now()->addDays(3)->format('Y-m-d') }}" --}} value="{{ Carbon\Carbon::now()->addDays(1)->format('Y-m-d') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success float-right">Find Meal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (Request::routeIs('student.meal.find'))
            <div class="page-header">
                <div class="col-md-12">
                    <h4 class="p-2 text-center">Reserved Meals</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Meal Type</th>
                                <th>Meal Items</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mealList as $item)
                                @if ($item->meal_type == 'Dinner')
                                    <tr>
                                        <td>{{ $item->day }}</td>
                                        <td>{{ $item->meal_type }}</td>
                                        <td>{{ $item->meal_items }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm bookButton">Book</button>
                                            <button class="btn btn-danger btn-sm reduceMeal">Reduce</button>
                                        </td>
                                    </tr>
                                @elseif($item->meal_type == 'Lunch')
                                    <tr>
                                        <td>{{ $item->day }}</td>
                                        <td>{{ $item->meal_type }}</td>
                                        <td>{{ $item->meal_items }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm bookButton">Book</button>
                                            <button class="btn btn-danger btn-sm reduceMeal">Reduce</button>
                                        </td>
                                    </tr>
                                @elseif ($item->meal_type == 'Breakfast')
                                    <tr>
                                        <td>{{ $item->day }}</td>
                                        <td>{{ $item->meal_type }}</td>
                                        <td>{{ $item->meal_items }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm bookButton">Book</button>
                                            <button class="btn btn-danger btn-sm reduceMeal">Reduce</button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-box pd-30 height-600 p-5">
                <form action="{{ route('student.meal.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ auth('student')->user()->student_id }}">
                    <input type="hidden" name="date" value="{{ $date }}">
                    <h4 class="p-2 text-center">Purchase Meals</h4>
                    <table class="table table-striped">
                        <tbody id="mealBookTable">
                            <thead>
                                <tr>
                                    <th>Meal Type</th>
                                    <th>Meal Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>BreakFast:</td>
                                <td><input type="number" name="breakfast_quantity" class="form-control" value="0"
                                        readonly>
                                </td>
                                <td><input type="number" name="breakfast_price" class="form-control" value="0"
                                        readonly></td>
                            </tr>
                            <tr>
                                <td>Lunch:</td>
                                <td><input type="number" name="lunch_quantity" class="form-control" value="0"
                                        readonly>
                                </td>
                                <td><input type="number" name="lunch_price" class="form-control" value="0" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Dinner:</td>
                                <td><input type="number" name="dinner_quantity" class="form-control" value="0"
                                        readonly>
                                </td>
                                <td><input type="number" name="dinner_price" class="form-control" value="0" readonly>
                                </td>
                            </tr>

                            <tr>
                                <td>Total:</td>
                                <td>
                                </td>
                                <td><input type="number" name="total" class="form-control" value="0" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Comments:</td>
                                <td colspan="2">
                                    <textarea name="comments" class="form-control"></textarea>
                                    <small class="text-info">If Any!</small>
                                </td>
                            </tr>
                            {{-- todo add hidden field to sum total price --}}
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </form>
            </div>
        @else
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h3 class="text-info text-center pd-10"><u>Meal Bill History</u></h3>

                        <table class="data-table table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Breafast<br>Quantity</th>
                                    <th>Breafast<br>Price</th>
                                    <th>Lunch<br>Quantity</th>
                                    <th>Lunch<br>Price</th>
                                    <th>Dinner<br>Quantity</th>
                                    <th>Dinner<br>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentMeals as $item)
                                    <tr>
                                        {{-- <td>{{ Carbon\Carbon::parse($item->date)->format('d M Y') }}</td> --}}
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->breakfast_quantity }}</td>
                                        <td>{{ $item->breakfast_price }}</td>
                                        <td>{{ $item->lunch_quantity }}</td>
                                        <td>{{ $item->lunch_price }}</td>
                                        <td>{{ $item->dinner_quantity }}</td>
                                        <td>{{ $item->dinner_price }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="7" class="text-right">Total:</td>
                                <td colspan="2">{{ $studentMeals->sum('total') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @endsection

    @push('js')
        <script>
            $(".bookButton").on("click", function() {
                let thisRow = $(this).closest("tr");
                let mealType = thisRow.children().eq(1).html();
                let mealPrice = thisRow.children().eq(3).html();
                let total = $("input[name='total']").val();
                // console.log(thisRow);
                // console.log(mealType);
                // console.log(mealPrice);
                if (mealType == 'Breakfast') {
                    let currentUnit = $("input[name='breakfast_quantity']").val();
                    let currentPrice = $("input[name='breakfast_price']").val();
                    currentUnit = parseInt(currentUnit) + 1;
                    currentPrice = parseInt(currentPrice) + parseInt(mealPrice);
                    $("input[name='breakfast_quantity']").val(currentUnit);
                    $("input[name='breakfast_price']").val(currentPrice);
                    total = parseInt(total) + parseInt(currentPrice);
                } else if (mealType == 'Lunch') {
                    let currentUnit = $("input[name='lunch_quantity']").val();
                    let currentPrice = $("input[name='lunch_price']").val();
                    currentUnit = parseInt(currentUnit) + 1;
                    currentPrice = parseInt(currentPrice) + parseInt(mealPrice);
                    $("input[name='lunch_quantity']").val(currentUnit);
                    $("input[name='lunch_price']").val(currentPrice);
                    total = parseInt(total) + parseInt(currentPrice);
                } else if (mealType == 'Dinner') {
                    let currentUnit = $("input[name='dinner_quantity']").val();
                    let currentPrice = $("input[name='dinner_price']").val();
                    currentUnit = parseInt(currentUnit) + 1;
                    currentPrice = parseInt(currentPrice) + parseInt(mealPrice);
                    $("input[name='dinner_quantity']").val(currentUnit);
                    $("input[name='dinner_price']").val(currentPrice);
                    total = parseInt(total) + parseInt(currentPrice);
                } else {
                    console.log('Unknown meal type');
                }
                $("input[name='total']").val(total);
            });
            $(".reduceMeal").on("click", function() {
                let thisRow = $(this).closest("tr");
                let mealType = thisRow.children().eq(1).html();
                let mealPrice = thisRow.children().eq(3).html();
                let total = $("input[name='total']").val();
                if (mealType == 'Breakfast') {
                    let currentUnit = $("input[name='breakfast_quantity']").val();
                    let currentPrice = $("input[name='breakfast_price']").val();
                    if (currentUnit != 0 && currentPrice != 0) {
                        currentUnit = parseInt(currentUnit) - 1;
                        currentPrice = parseInt(currentPrice) - parseInt(mealPrice);
                        $("input[name='breakfast_quantity']").val(currentUnit);
                        $("input[name='breakfast_price']").val(currentPrice);
                        total = parseInt(total) - parseInt(mealPrice);
                        $("input[name='total']").val(total);
                    }
                } else if (mealType == 'Lunch') {
                    let currentUnit = $("input[name='lunch_quantity']").val();
                    let currentPrice = $("input[name='lunch_price']").val();
                    if (currentUnit != 0 && currentPrice != 0) {
                        currentUnit = parseInt(currentUnit) - 1;
                        currentPrice = parseInt(currentPrice) - parseInt(mealPrice);
                        $("input[name='lunch_quantity']").val(currentUnit);
                        $("input[name='lunch_price']").val(currentPrice);
                        total = parseInt(total) - parseInt(mealPrice);
                        $("input[name='total']").val(total);
                    }
                } else if (mealType == 'Dinner') {
                    let currentUnit = $("input[name='dinner_quantity']").val();
                    let currentPrice = $("input[name='dinner_price']").val();
                    if (currentUnit != 0 && currentPrice != 0) {
                        currentUnit = parseInt(currentUnit) - 1;
                        currentPrice = parseInt(currentPrice) - parseInt(mealPrice);
                        $("input[name='dinner_quantity']").val(currentUnit);
                        $("input[name='dinner_price']").val(currentPrice);
                        total = parseInt(total) - parseInt(mealPrice);
                        $("input[name='total']").val(total);
                    }
                } else {
                    console.log('Unknown meal type');
                }
            });
        </script>
    @endpush
