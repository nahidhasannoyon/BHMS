@extends('admin.layout.master')
@section('content')
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adminMeals as $item)
                                <tr>
                                    <td>{{ Carbon::parse($item->date)->format('d M Y') }}</td>
                                    <td>{{ $item->breakfast }}</td>
                                    <td>{{ $item->lunch }}</td>
                                    <td>{{ $item->dinner }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
