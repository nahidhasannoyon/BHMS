@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.meal.store') }}" method="post">
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
                                <th>Date</th>
                                <th>Breakfast</th>
                                <th>Lunch</th>
                                <th>Dinner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adminMeals as $item)
                                <tr>
                                    <td>{{ Carbon::parse($item->date)->format('d M Y') }}</td>
                                    <td>{{ $item->breakfast }}</td>
                                    <td>{{ $item->lunch }}</td>
                                    <td>{{ $item->dinner }}</td>
                                    <td>
                                        <a href="{{ route('admin.meal.edit', $item->id) }}" class="btn btn-warning btn-sm"
                                            data-toggle="tooltip" data-placement="bottom" title="Edit"><i
                                                class="icon-copy dw dw-edit-1"></i></a>
                                        <a href="{{ route('admin.meal.delete', $item->id) }}" class="btn btn-danger btn-sm"
                                            data-toggle="tooltip" data-placement="bottom" title="Delete"
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
