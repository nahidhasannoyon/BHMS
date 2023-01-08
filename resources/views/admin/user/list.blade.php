@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        @can('add-user')
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                        data-target="#add-new-user">
                        <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                        Add New User</a>
                </div>
            </div>
        @endcan
        <div class="row align-items-center">
            <div class="col-md-12 table-responsive">
                <h3 class="text-info text-center pd-10"> Users </h3>
                <table class="table table-striped hover data-table nowrap">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($users->where('email', '!=', 'ict@baiust.edu.bd') as $user) --}}
                        {{-- todo uncomment the above line and remove the below line  --}}
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->employee_id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @can('edit-user')
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm"
                                            data-toggle="tooltip" data-placement="bottom" title="Edit"><i
                                                class="icon-copy dw dw-edit-1"></i></a>
                                    @endcan
                                    @can('edit-permissions')
                                        <a href="{{ route('admin.users.permissions', $user->id) }}"
                                            class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom"
                                            title="Permissions"><i class="icon-copy dw dw-user-13"></i></a>
                                    @endcan
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
                                        <label>Phone Number: </label><span class="text-danger">*</span>
                                        <select name="name_email_phone" class="custom-select2" style="width: 100%" required>
                                            <option value="" selected disabled>Please select a user...</option>
                                            @foreach ($iumss_users as $iumss_user)
                                                <option
                                                    value="{{ $iumss_user['name'] . ' - ' . $iumss_user['email'] . ' - ' . $iumss_user['phone'] }}">
                                                    {{ $iumss_user['name'] . ' - ' . $iumss_user['email'] . ' - ' . $iumss_user['phone'] }}
                                                </option>
                                            @endforeach
                                        </select>
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
