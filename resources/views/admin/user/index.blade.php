@extends('layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-meal-type">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add New User</a>
                <div class="modal fade bs-example-modal-lg" id="add-meal-type" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Add New User From Here</h4>
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
                                                    <label for="">Name:</label><span class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="name" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Role:</label><span class="text-danger">*</span>
                                                    <select name="role" class="custom-select2 form-control"
                                                        style="width: 100%; height: 38px;" data-validation="required"
                                                        required>
                                                        <option selected disabled value>Choose...</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="accountant">Accountant</option>
                                                        <option value="hostel_manager">Hostel Manager</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Email:</label><span class="text-danger">*</span>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Password:</label><span
                                                        class="text-danger">*</span>
                                                    <input type="password" class="form-control" name="password" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success btn-md float-right">
                                                        <i class="icon-copy dw dw-add"
                                                            style="font-family: dropways, Bangla526, sans-serif;"></i> Add
                                                        New User
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
                <h3 class="text-info text-center pd-10"> Users </h3>
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
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                {{-- todo add check marks before every seat detail --}}

                                <td></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                        data-placement="bottom" title="Edit"><i class="icon-copy dw dw-edit-1"></i></a>
                                    {{-- {{route('student-information.edit', $student->id)}} --}}
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                        data-placement="bottom" title="Delete"><i class="icon-copy dw dw-trash1"></i></a>
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
