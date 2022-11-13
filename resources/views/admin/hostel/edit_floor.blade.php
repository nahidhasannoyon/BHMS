@extends('admin.layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-md-12"><a
                    href="{{ route('admin.hostel.floor.flat.list', [
                        'building' => $floor->building_id,
                        'floor' => $floor->id,
                    ]) }}"
                    class="btn btn-primary btn-md float-left">
                    <i class="icon-copy bi bi-arrow-90deg-left" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Floors</a>
            </div>
        </div>
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Edit Floor</u></h4>
        </div>
        <div class="col-md-12">
            <form
                action="{{ route('admin.hostel.floor.list', [
                    'building' => $floor->building_id,
                    'floor' => $floor->id,
                ]) }}"
                method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Floor Name:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" required value="{{ $floor->name }}">
                        </div>
                        <input type="hidden" name="floor_id" value="{{ $floor->id }}">
                        <input type="hidden" name="building_id" value="{{ $floor->building_id }}">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-md float-right">
                                <i style="font-family: dropways, Bangla526, sans-serif;"></i>
                                Update
                                Floor
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
