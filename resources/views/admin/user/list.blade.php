@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-new-user">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add New User</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 table-responsive">
                <h3 class="text-info text-center pd-10"> Users </h3>
                <table class="checkbox-datatable data-table table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm"
                                        data-toggle="tooltip" data-placement="bottom" title="Edit"><i
                                            class="icon-copy dw dw-edit-1"></i></a>
                                    <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger btn-sm"
                                        data-toggle="tooltip" data-placement="bottom" title="Delete"
                                        onclick="return confirm('Are you sure to delete this User from the list?')"><i
                                            class="icon-copy dw dw-trash1"></i></a>
                                    <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip"
                                        data-placement="bottom" title="Permissions"><i
                                            class="icon-copy dw dw-user-13"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="add-new-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add New User From Here</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.users.add') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Name:</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Role:</label><span class="text-danger">*</span>
                                        <select name="role" class="custom-select2 form-control"
                                            style="width: 100%; height: 38px;" data-validation="required" required>
                                            <option selected disabled value>Choose...</option>
                                            <option value="admin">Admin</option>
                                            <option value="accountant">Accountant</option>
                                            <option value="hostel_manager">Hostel Manager</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Email:</label><span class="text-danger">*</span>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Password:</label><span class="text-danger">*</span>
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
@endsection
