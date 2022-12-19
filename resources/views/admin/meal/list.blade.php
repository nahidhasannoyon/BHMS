@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-new-meal">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add Meal Type</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 table-responsive">
                <h3 class="text-info text-center pd-10"><u>Hostel Meal</u></h3>
                <table class="data-table table table-striped">
                    <thead>
                        <tr>
                            <td>Day</td>
                            <td>Meal Type</td>
                            <td>Meal Item</td>
                            <td>Price</td>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($meals->count() > 0)
                            @foreach ($meals as $meal)
                                <tr>
                                    <td>{{ $meal->day }}</td>
                                    <td>{{ $meal->meal_type }}</td>
                                    <td>{{ $meal->meal_items }}</td>
                                    <td>{{ $meal->price }}</td>
                                    <td>
                                        <a href="{{ route('admin.meal.edit', $meal->id) }}" class="btn btn-warning btn-md"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="icon-copy dw dw-edit-1"
                                                style="font-family: dropways, Bangla791, sans-serif;"></i></a>
                                        <a href="{{ route('admin.meal.delete', $meal->id) }}" class="btn btn-danger btn-md"
                                            data-toggle="tooltip" data-placement="top" title="Delete"
                                            onclick="return confirm('Are you sure to delete this item from the list?')"><i
                                                class="icon-copy dw dw-trash1"
                                                style="font-family: dropways, Bangla791, sans-serif;"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="add-new-meal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add New Meal Type From Here</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.meal.list') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Meal Day:</label><span class="text-danger">*</span>
                                        <select name="day" class="custom-select2 form-control"
                                            style="width: 100%; height: 38px;" data-validation="required" required>
                                            <option selected disabled value>Choose...</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Meal Type:</label><span class="text-danger">*</span>
                                        <select name="meal_type" class="custom-select2 form-control"
                                            style="width: 100%; height: 38px;" data-validation="required" required>
                                            <option selected disabled value>Choose...</option>
                                            <option value="Breakfast">Breakfast</option>
                                            <option value="Lunch">Lunch</option>
                                            <option value="Dinner">Dinner</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Meal Items:</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="meal_items" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Meal Price:</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control" name="price" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success btn-md float-right">
                                            <i class="icon-copy dw dw-add"
                                                style="font-family: dropways, Bangla526, sans-serif;"></i> Add meal
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
