@extends('admin.layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Add Student</u></h4>
        </div>
        <div class="col-md-12">
            <form action="{{ route('admin.student.store') }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Student Id - Name - Department :</label><span class="text-danger">*</span>
                            <select name="id_name_dept" class="custom-select2" style="width: 100%" required>
                                <option value="" selected disabled>Please select a student...</option>
                                @foreach ($students as $student)
                                    <option
                                        value="{{ $student->Registration_Number . ' - ' . $student->Full_Name . ' - ' . $student->Program }}">
                                        {{ $student->Registration_Number . ' - ' . $student->Full_Name . ' - ' . $student->Program }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="building">Building Name:</label><span class="text-danger">*</span>
                            <select class="custom-select2 form-control" id="building" style="width: 100%; height: 38px;"
                                name="building" data-validation="required" placeholder='Select a Value'
                                data-dependant="floor" required>
                                @if ($buildings->count() > 0)
                                    <option value="" selected disabled>Please select a building...</option>

                                    @foreach ($buildings as $building)
                                        <option value="{{ $building->id }}">
                                            {{ $building->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" selected disabled>No Available Building</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="floor">Floor Number:</label><span class="text-danger">*</span>
                            <select class="form-control custom-select2" id="floor" style="width: 100%; height: 38px;"
                                name="floor" data-dependant="flat" data-validation="required" placeholder='Select a Value'
                                required>

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="flat">Flat Number:</label><span class="text-danger">*</span>
                            <select class="custom-select2 form-control" id="flat" style="width: 100%; height: 38px;"
                                name="flat" data-validation="required" data-dependant="seat" placeholder='Select a Value'
                                required>

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="seat">Seat Number:</label><span class="text-danger">*</span>
                            <select class="form-control custom-select2" id="seat" style="width: 100%; height: 38px;"
                                name="seat" data-validation="required" placeholder='Select a Value' required>
                            </select>
                        </div>
                        {{ csrf_field() }}

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

@push('js')
    <script>
        $(document).ready(function() {
            $('#building').on('change', function() {
                let id = $(this).val();
                $('#floor').empty();
                $('#flat').empty();
                $('#seat').empty();
                $('#floor').append(`<option value="0" disabled selected>Searching...</option>`);
                $.ajax({
                    type: 'GET',
                    url: 'admit/' +
                        id + ' /getFloor/ ',
                    success: function(response) {
                        var response = JSON.parse(response);
                        $('#floor').empty();
                        $('#floor').append(
                            `<option value="0" disabled selected>Please select a Floor</option>`
                        );
                        response.forEach(element => {
                            $('#floor').append(
                                `<option value="${element['id']}">${element['name']}</option>`
                            );
                        });
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#floor').on('change', function() {
                let id = $(this).val();
                $('#flat').empty();
                $('#seat').empty();
                $('#flat').append(`<option value="0" disabled selected>Searching...</option>`);
                $.ajax({
                    type: 'GET',
                    url: 'admit/' +
                        id + ' /getFlat/ ',
                    success: function(response) {
                        var response = JSON.parse(response);
                        $('#flat').empty();
                        $('#flat').append(
                            `<option value="0" disabled selected>Please select a Flat</option>`
                        );
                        response.forEach(element => {
                            $('#flat').append(
                                `<option value="${element['id']}">${element['name']}</option>`
                            );
                        });
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#flat').on('change', function() {
                let id = $(this).val();
                $('#seat').empty();
                $('#seat').append(`<option value="0" disabled selected>Searching...</option>`);
                $.ajax({
                    type: 'GET',
                    url: 'admit/' +
                        id + ' /getSeat/ ',
                    success: function(response) {
                        var response = JSON.parse(response);
                        $('#seat').empty();
                        $('#seat').append(
                            `<option value="0" disabled selected>Please select a Seat</option>`
                        );
                        response.forEach(element => {
                            if (element['status'] == 0)
                                $('#seat').append(
                                    `<option value="${element['id']}">${element['name']}</option>`
                                );
                        });
                    }
                });
            });
        });
    </script>
@endpush
