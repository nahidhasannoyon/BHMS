@extends('admin.layout.master')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>My Profile</u></h4>
        </div>
        <form action="{{ route('admin.profile.update') }}" method="post">
            @csrf
            @method('patch')
            <div class="form-row">
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label for="">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }} " required>

                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label for="">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }} " required>

                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label for="">Password:</label>
                    <input type="password" name="password" class="form-control" required>

                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success float-right">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
