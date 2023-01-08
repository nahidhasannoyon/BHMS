@extends('admin.layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Edit User</u></h4>
        </div>
        <div class="col-md-12">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Name:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" required value="{{ $user->name }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Email:</label><span class="text-danger">*</span>
                            <input type="email" class="form-control" name="email" required value="{{ $user->email }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-md float-right">
                                <i style="font-family: dropways, Bangla526, sans-serif;"></i>
                                Update User
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
