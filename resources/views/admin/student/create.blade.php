@extends('layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Add Student</u><span class="text-danger">*</span></h4>
        </div>
        {{-- {{ route('admin.student.store') }} --}}
        <div class="col-md-12">
            <form action="#" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Student Name:</label>
                            <input class="form-control" type="text" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Student ID:</label>
                            <input type="text" class="form-control" name="studentID" data-validation="required" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Department:</label>
                            <select name="dept" class="custom-select2 form-control" style="width: 100%; height: 38px;" data-validation="required">
                                <option selected>Choose...</option>
                                <option value="cse">CSE</option>
                                <option value="eee">EEE</option>
                                <option value="ce">CE</option>
                                <option value="bba">BBA</option>
                                <option value="engh">English</option>
                                <option value="llb">LLB</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Seat Number:</label>
                            <select class="custom-select2 form-control" style="width: 100%; height: 38px;" name="seat_id" data-validation="required" placeholder='Select a Value'>
                                <option selected>Choose...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Student Phone Number:</label>
                            <input type="text" class="form-control" name="phone" data-validation="required" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Guardian Phone Number:</label>
                            <input type="text" class="form-control" name="g_phone" data-validation="required" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Remarks:</label>
                            <input type="text" class="form-control" name="remarks" data-validation="required" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Status:</label>
                            <input type="text" value="Active" class="form-control text-success" name="status" data-validation="required">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Address:</label>
                            <textarea class="form-control" name="current_LT" id="" cols="30" rows="5" data-validation="required"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-success btn-md float-right " type="submit"><i class="icon-copy dw dw-up-arrow-11"></i>Submit</button>
                        </div>
                
                </div>
                
            </form>
        </div>
    </div>
@endsection