@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('building_list') }}" class="btn btn-primary btn-md float-left">
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
                            {{--  todo add asc and dec icon to sort --}}
                            <th>#</th>
                            <th>Floor Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($floors as $floor)
                            @if ($floor->building_id == $building->id)
                                <tr>
                                    {{-- todo add check marks before every seat detail --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $floor->name }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Edit"><i
                                                class="icon-copy dw dw-edit-1"></i></a>
                                        {{-- {{route('student-information.edit', $student->id)}} --}}
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"><i
                                                class="icon-copy dw dw-trash1"></i></a>
                                        <a href="{{ route('flat_list', $floor->id) }}" class="btn btn-success btn-sm"
                                            data-toggle="tooltip" data-placement="bottom" title="View"><i
                                                class="icon-copy bi bi-arrow-right-square"></i></a>
                                        {{-- {{ route('student-information.destroy',$student->id)}} --}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
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
                            <form action="{{ route('add_floor') }}" method="post">
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
