@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">

                <a href="{{ route('admin.hostel.floor.flat.list', ['building' => $building->id, 'floor' => $floor->id]) }}"
                    class="btn btn-primary btn-md float-left">
                    <i class="icon-copy bi bi-arrow-90deg-left" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Flats</a>
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-new-seat">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add Seat</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 table-responsive">
                <h3 class="text-info text-center pd-10">{{ 'Flat: ' . $flat->name }}</h3>
                <table class="data-table table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Seat Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seats as $seat)
                            @if ($seat->flat_id == $flat->id)
                                <tr>
                                    <td>{{ $seat->name }}</td>
                                    @if ($seat->status == '0')
                                        <td class="text-success"><i aria-hidden="true"></i>Available</td>
                                    @else
                                        <td class="text-danger"><i></i>Occupied
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.hostel.floor.flat.seat.edit', [
                                            'building' => $building->id,
                                            'floor' => $floor->id,
                                            'flat' => $flat->id,
                                            'seat' => $seat->id,
                                        ]) }}"
                                            class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom"
                                            title="Edit"><i class="icon-copy dw dw-edit-1"></i></a>
                                        <a href="{{ route('admin.hostel.floor.flat.seat.delete', [
                                            'building' => $building->id,
                                            'floor' => $floor->id,
                                            'flat' => $flat->id,
                                            'seat' => $seat->id,
                                        ]) }}"
                                            class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom"
                                            title="Delete" onclick="return confirm('Are you sure to delete this Seat?')"><i
                                                class="icon-copy dw dw-trash1"></i></a>

                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <p class="text-center text-white bg-secondary pd-5">Total Seat: {{ $total_seat }},
                    Available: {{ $seats_available }} & Occupied:
                    {{ $seats_occupied }} </p>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="add-new-seat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add New Seat From Here</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form
                                action="{{ route('admin.hostel.floor.flat.seat.add', ['building' => $building->id, 'floor' => $floor->id, 'flat' => $flat->id]) }}"
                                method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Seat Name:</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <input type="hidden" name="flat_id" value="{{ $flat->id }}">
                                    <input type="hidden" name="floor_id" value="{{ $floor->id }}">
                                    <input type="hidden" name="building_id" value="{{ $building->id }}">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success btn-md float-right">
                                            <i class="icon-copy dw dw-add"
                                                style="font-family: dropways, Bangla526, sans-serif;"></i> Add Seat
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
