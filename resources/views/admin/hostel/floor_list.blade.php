@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.hostel.list') }}" class="btn btn-primary btn-md float-left">
                    <i class="icon-copy bi bi-arrow-90deg-left" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Buildings</a>
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-meal-type">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add Floor</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 table-responsive">
                <h3 class="text-info text-center pd-10">{{ $building->name }}</h3>
                <table class="data-table table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Floor Name</th>
                            <th>Capacity</th>
                            <th>Available</th>
                            <th>Occupied</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($floors as $floor)
                            <tr>
                                <td>{{ $floor->name }}</td>
                                <td> {{ $floor->seats->count() }}</td>
                                <td>{{ $floor->seats->where('status', 0)->count() }} </td>
                                <td>{{ $floor->seats->where('status', 1)->count() }} </td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                        data-placement="bottom" title="Edit"><i class="icon-copy dw dw-edit-1"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                        data-placement="bottom" title="Delete"
                                        onclick="return confirm('Are you sure to delete this Floor?')"><i
                                            class="icon-copy dw dw-trash1"></i></a>
                                    <a href="{{ route('admin.hostel.floor.flat.list', ['building' => $building->id, 'floor' => $floor->id]) }}"
                                        class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom"
                                        title="View"><i class="icon-copy bi bi-arrow-right-square"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="text-center text-white bg-secondary pd-5">Total Seat: {{ $total_seat }},
                    Available: {{ $seats_available }} & Occupied:
                    {{ $seats_occupied }} </p>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="add-meal-type" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add New Floor From Here</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.hostel.floor.add', $building->id) }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Floor Name:</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <input type="hidden" name="building_id" value="{{ $building->id }}">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success btn-md float-right">
                                            <i class="icon-copy dw dw-add"
                                                style="font-family: dropways, Bangla526, sans-serif;"></i> Add Floor
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
