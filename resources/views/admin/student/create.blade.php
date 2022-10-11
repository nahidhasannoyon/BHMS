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
                        <div class="form-group col-md-6">
                            <label>Student Name:</label><span class="text-danger">*</span>
                            <input class="form-control" type="text" name="name" placeholder="Name" required
                                value="{{ old('name') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Student ID:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="studentID" data-validation="required"
                                value="{{ old('studentID') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Department:</label><span class="text-danger">*</span>
                            <select name="dept" class="custom-select2 form-control" style="width: 100%; height: 38px;"
                                data-validation="required" required>
                                <option selected disabled value>Choose...</option>
                                <option value="CSE">CSE</option>
                                <option value="EEE">EEE</option>
                                <option value="CE">CE</option>
                                <option value="BBA">BBA</option>
                                <option value="English">English</option>
                                <option value="LLB">LLB</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Seat Number:</label><span class="text-danger">*</span>
                            <select class="custom-select2 form-control" style="width: 100%; height: 38px;" name="seat_id"
                                data-validation="required" placeholder='Select a Value' required>
                                <option selected disabled value>Choose...</option>
                                @foreach ($hostels as $hostel)
                                    <option value="{{ $hostel->id }}">
                                        {{ $hostel->building_name . '-' . $hostel->floor . '-' . $hostel->flat . '-' . $hostel->seat }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Student Phone Number:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="phone" data-validation="required"
                                value="" required>
                        </div>
                        <div class="form-group col-md-6">
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
                                data-validation="required" required>
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
