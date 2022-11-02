@extends('admin.layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Add Student</u></h4>
        </div>
        {{-- {{ route('admin.student.store') }} --}}
        <div class="col-md-12">
            <form action="#" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Student Id - Name - Department :</label><span class="text-danger">*</span>
                            <input class="form-control" type="text" name="id_name_dept" placeholder="Id - Name - Dept. "
                                required value="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Building Name:</label><span class="text-danger">*</span>
                            <select class="custom-select2 form-control" style="width: 100%; height: 38px;"
                                name="building_name" data-validation="required" placeholder='Select a Value' required>
                                <option selected disabled value>Choose...</option>
                                @foreach ($hostel_buildings as $hostel_building)
                                    <option value="{{ $hostel_building->id }}">
                                        {{ $hostel_building->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Floor Number:</label><span class="text-danger">*</span>
                            <select class="form-control" style="width: 100%; height: 38px;" name="building_name"
                                data-validation="required" placeholder='Select a Value' required>
                                <option selected disabled value>Choose...</option>

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Flat Number:</label><span class="text-danger">*</span>
                            <select class="form-control" style="width: 100%; height: 38px;" name="building_name"
                                data-validation="required" placeholder='Select a Value' required>
                                <option selected disabled value>Choose...</option>

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Seat Number:</label><span class="text-danger">*</span>
                            <select class="form-control" style="width: 100%; height: 38px;" name="building_name"
                                data-validation="required" placeholder='Select a Value' required>
                                <option selected disabled value>Choose...</option>

                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Student Phone Number:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="phone" data-validation="required"
                                value="" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Guardian Phone Number:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="g_phone" data-validation="required"
                                value="" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Remarks:</label>
                            <textarea name="remarks" class="form-control" cols="20" rows="10" data-validation="required"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Status:</label>
                            <input type="text" value="Active" class="form-control text-success" name="status"
                                data-validation="required" required disabled>
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-success btn-md float-right " type="submit"><i
                                    class="icon-copy dw dw-up-arrow-11"></i>Submit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
