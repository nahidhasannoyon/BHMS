@extends('admin.layout.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <style>
        .toggle.ios,
        .toggle-on.ios,
        .toggle-off.ios {
            border-radius: 15rem;
        }

        .toggle.ios .toggle-handle {
            border-radius: 15rem;
        }
    </style>
@endpush
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Edit Permissions</u></h4>
        </div>
        <div class="col-md-12">
            <form action="{{ route('admin.users.permissions.update', $user->id) }}" method="post">
                @csrf
                <div class="col-md-12">
                    {{-- * User Permissions --}}
                    <div class="form-row">
                        <div class="title pb-20 d-block">
                            <h2 class="h3 mb-0">User Permissions</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">See Users</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="see-users" {{ $user->hasPermissionTo('see-users') ? 'checked' : '' }}>
                        </div>
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">Add User</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="add-user" {{ $user->hasPermissionTo('add-user') ? 'checked' : '' }}>
                        </div>
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">Edit User</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="edit-user" {{ $user->hasPermissionTo('edit-user') ? 'checked' : '' }}>
                        </div>
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">Edit User Permissions</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="edit-permissions" {{ $user->hasPermissionTo('edit-permissions') ? 'checked' : '' }}>
                        </div>
                    </div>
                    {{-- * Student Permissions --}}
                    <div class="form-row">
                        <div class="title pb-20 d-block">
                            <h2 class="h3 mb-0">Student Permissions</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">Add Student</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="add-student" {{ $user->hasPermissionTo('add-student') ? 'checked' : '' }}>
                        </div>
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">See Students</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="see-students" {{ $user->hasPermissionTo('see-students') ? 'checked' : '' }}>
                        </div>
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">Edit student</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="edit-student" {{ $user->hasPermissionTo('edit-student') ? 'checked' : '' }}>
                        </div>
                    </div>
                    {{-- * Student Permissions --}}
                    <div class="form-row">
                        <div class="title pb-20 d-block">
                            <h2 class="h3 mb-0">Meal Permissions</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">Edit Meal</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="edit-meal" {{ $user->hasPermissionTo('edit-meal') ? 'checked' : '' }}>
                        </div>
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">See Booked Meals</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="see-booked-meals" {{ $user->hasPermissionTo('see-booked-meals') ? 'checked' : '' }}>
                        </div>
                        <div class="form-check form-group col-lg-4 col-md-4 col-sm-6">
                            <label class="form-check-label">Book Meal</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                name="book-meal" {{ $user->hasPermissionTo('book-meal') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-md float-right">
                                <i style="font-family: dropways, Bangla526, sans-serif;"></i>
                                Update Permissions
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush
