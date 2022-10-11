@extends('layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-meal-type">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add Hostel Seat</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12">
                <h3 class="text-info text-center pd-10"> {{ $hostelName }} </h3>
                <table class="checkbox-datatable table table-striped text-center">
                    <thead>
                        <tr>
                            <th>
                                <div class="dt-checkbox">
                                    <input type="checkbox" name="select_all" value="1" id="example-select-all">
                                    <span class="dt-checkbox-label"></span>
                                </div>
                            </th>
                            {{--  todo add asc and dec icon to sort --}}
                            <th>#</th>
                            <th>Floor</th>
                            <th>Flat</th>
                            <th>Seat Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($hostelSeats as $hostelSeat)
                            <tr>
                                {{-- todo add check marks before every seat detail --}}
                                @if ($hostelSeat->building_name == $hostelName)
                                    <td></td>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $hostelSeat->floor }}</td>
                                    <td>{{ $hostelSeat->flat }}</td>
                                    <td>{{ $hostelSeat->seat }}</td>
                                    @if ($hostelSeat->status == '0')
                                        <td class="text-success"><i class="icon-copy fa fa-check-circle"
                                                aria-hidden="true"></i>Seat
                                            Available</td>
                                    @else
                                        <td class="text-danger"><i class="icon-copy ion-close-circled"></i>Seat Occupied
                                        </td>
                                    @endif
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Edit"><i
                                                class="icon-copy dw dw-edit-1"></i></a>
                                        {{-- {{route('student-information.edit', $student->id)}} --}}
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"><i
                                                class="icon-copy dw dw-trash1"></i></a>
                                        {{-- {{ route('student-information.destroy',$student->id)}} --}}
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="add-meal-type" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add New Hostel Seat From Here</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <form action="{{ route('hostel_seats.store') }}" method="post"> --}}
                            <form action="#" method="post">
                                @csrf
                                <div class="form-row">
                                    {{-- <div class="form-group col-md-12">
                                                    <label for="">Building Name:</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="building_name"
                                                        required>
                                                </div> --}}

                                    <div class="form-group col-md-12">
                                        <label for="">Floor:</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="floor" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Flat:</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="flat" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Seat Number:</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="seat" required>
                                    </div>
                                    <input type="hidden" name="status" value="0">
                                    <input type="hidden" name="building_name" value="{{ $hostelName }}">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success btn-md float-right">
                                            <i class="icon-copy dw dw-add"
                                                style="font-family: dropways, Bangla526, sans-serif;"></i> Add
                                            Hostel Seat
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
