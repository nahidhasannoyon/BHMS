@extends('admin.layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-md-12"><a
                    href="{{ route('admin.hostel.floor.flat.list', [
                        'building' => $flat->building_id,
                        'floor' => $flat->floor_id,
                        'flat' => $flat->id,
                    ]) }}"
                    class="btn btn-primary btn-md float-left">
                    <i class="icon-copy bi bi-arrow-90deg-left" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Flats</a>
            </div>
        </div>
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Edit Flat</u></h4>
        </div>
        <div class="col-md-12">
            <form
                action="{{ route('admin.hostel.floor.flat.update', ['building' => $flat->building_id, 'floor' => $flat->floor_id, 'flat' => $flat->id]) }}"
                method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Flat Name:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" required value="{{ $flat->name }}">
                        </div>
                        <input type="hidden" name="id" value="{{ $flat->id }}">
                        <input type="hidden" name="floor_id" value="{{ $flat->floor_id }}">
                        <input type="hidden" name="building_id" value="{{ $flat->building_id }}">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-md float-right">
                                <i style="font-family: dropways, Bangla526, sans-serif;"></i>
                                Update
                                Flat
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
