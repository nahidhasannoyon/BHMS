@extends('admin.layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Edit Building</u></h4>
        </div>
        <div class="col-md-12">
            <form action="{{ route('admin.hostel.update_building', $building->id) }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Building Name:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" required
                                value="{{ $building->name }}">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-md float-right">
                                <i style="font-family: dropways, Bangla526, sans-serif;"></i>
                                Update
                                Hostel Building
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
