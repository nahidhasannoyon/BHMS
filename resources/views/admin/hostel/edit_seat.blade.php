@extends('admin.layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-md-12"><a
                    href="{{ route('admin.hostel.floor.flat.seat.list', [
                        'building' => $seat->building_id,
                        'floor' => $seat->floor_id,
                        'flat' => $seat->flat_id,
                        'seat' => $seat->id,
                    ]) }}"
                    class="btn btn-primary btn-md float-left">
                    <i class="icon-copy bi bi-arrow-90deg-left" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Seats</a>
            </div>
        </div>
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Edit Seat</u></h4>
        </div>
        <div class="col-md-12">
            <form
                action="{{ route('admin.hostel.floor.flat.seat.update', ['building' => $seat->building_id, 'floor' => $seat->floor_id, 'flat' => $seat->flat_id, 'seat' => $seat->id]) }}"
                method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Seat Name:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="name" required value="{{ $seat->name }}">
                        </div>
                        <input type="hidden" name="id" value="{{ $seat->id }}">
                        <input type="hidden" name="flat_id" value="{{ $seat->flat_id }}">
                        <input type="hidden" name="floor_id" value="{{ $seat->floor_id }}">
                        <input type="hidden" name="building_id" value="{{ $seat->building_id }}">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-md float-right">
                                <i style="font-family: dropways, Bangla526, sans-serif;"></i>
                                Update
                                Seat
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
