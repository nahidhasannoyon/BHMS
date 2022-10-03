@extends('layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-meal-type">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add Hostel Building</a>
                <div class="modal fade bs-example-modal-lg" id="add-meal-type" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Add New Hostel Building From Here</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- <form action="{{ route('hostel_seats.store') }}" method="post"> --}}
                                        <form action="#" method="post">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="">Building Name:</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="name" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success btn-md float-right">
                                                        <i class="icon-copy dw dw-add"
                                                            style="font-family: dropways, Bangla526, sans-serif;"></i> Add
                                                        Hostel Building
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
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12">
                <h3 class="text-info text-center pd-10">Hostel Buildings</h3>
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
                            <th>Building Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hostelBuildings as $hostelBuilding)
                            <tr>
                                <td></td>
                                {{-- todo add check marks before every seat detail --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hostelBuilding->name }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                        data-placement="bottom" title="Edit"><i class="icon-copy dw dw-edit-1"></i></a>
                                    {{-- {{route('student-information.edit', $student->id)}} --}}
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                        data-placement="bottom" title="Delete"><i class="icon-copy dw dw-trash1"></i></a>
                                    <a href="{{ route('seat_list', $hostelBuilding->name) }}" class="btn btn-success btn-sm"
                                        data-toggle="tooltip" data-placement="bottom" title="Edit"><i
                                            class="icon-copy bi bi-arrow-right-square"></i></a>
                                    {{-- {{ route('student-information.destroy',$student->id)}} --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection