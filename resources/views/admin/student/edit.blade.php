@extends('admin.layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Edit Student</u></h4>
        </div>
        {{-- {{ route('admin.student.store') }} --}}
        <div class="col-md-12">
            <form action="{{ route('update_student', $student->id) }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Student Id - Name - Department :</label><span class="text-danger">*</span>
                            <select name="id_name_dept" class="custom-select2" style="width: 100%" required>

                                @foreach ($api_students as $api_student)
                                    <option
                                        value="{{ $api_student->Registration_Number . ' - ' . $api_student->Full_Name . ' - ' . $api_student->Program }}"
                                        {{ $api_student->Registration_Number == $student->student_id ? 'selected' : '' }}>
                                        {{ $api_student->Registration_Number . ' - ' . $api_student->Full_Name . ' - ' . $api_student->Program }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="building">Building Name:</label><span class="text-danger">*</span>
                            <select class="custom-select2 form-control" id="building" style="width: 100%; height: 38px;"
                                name="building" data-validation="required" placeholder='Select a Value'
                                data-dependant="floor" required>
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id }}"
                                        {{ $student->building == $building->id ? 'selected' : '' }}>
                                        {{ $building->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="floor">Floor Number:</label><span class="text-danger">*</span>
                            <select class="form-control custom-select2" id="floor" style="width: 100%; height: 38px;"
                                name="floor" data-dependant="flat" data-validation="required" placeholder='Select a Value'
                                required>
                                @foreach ($floors as $floor)
                                    @if ($student->building == $floor->building_id)
                                        <option value="{{ $floor->id }}"
                                            {{ $student->floor == $floor->id ? 'selected' : '' }}>
                                            {{ $floor->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="flat">Flat Number:</label><span class="text-danger">*</span>
                            <select class="custom-select2 form-control" id="flat" style="width: 100%; height: 38px;"
                                name="flat" data-validation="required" data-dependant="seat" placeholder='Select a Value'
                                required>
                                @foreach ($flats as $flat)
                                    @if ($student->floor == $flat->floor_id)
                                        <option value="{{ $flat->id }}"
                                            {{ $student->flat == $flat->id ? 'selected' : '' }}>
                                            {{ $flat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="seat">Seat Number:</label><span class="text-danger">*</span>
                            <select class="form-control custom-select2" id="seat" style="width: 100%; height: 38px;"
                                name="seat" data-validation="required" placeholder='Select a Value' required>
                                @foreach ($seats as $seat)
                                    @if ($student->flat == $seat->flat_id)
                                        <option value="{{ $seat->id }}"
                                            {{ $student->seat == $seat->id ? 'selected' : '' }}>
                                            {{ $seat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        {{ csrf_field() }}

                        <div class="form-group col-md-4">
                            <label for="">Student Phone Number:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="phone" data-validation="required"
                                value="{{ $student->phone }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Guardian Phone Number:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="g_phone" data-validation="required"
                                value="{{ $student->g_phone }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Remarks:</label>
                            <textarea name="remarks" class="form-control" cols="20" rows="10" data-validation="required">{{ $student->remarks }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Status:</label>
                            <select class="custom-select2 form-control" value="{{ $student->status }}" name="status"
                                placeholder='Select a Value' required>
                                <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $student->status == 2 ? 'selected' : '' }}>Inactive</option>
                                <option value="3" {{ $student->status == 3 ? 'selected' : '' }}>Cancelled</option>
                                <option value="4" {{ $student->status == 4 ? 'selected' : '' }}>Left</option>
                            </select>

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
                $.ajax({
                    type: 'GET',
                    url: 'edit/' +
                        id + '/updateFloor/ ',
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#floor').empty();
                        $('#floor').append(
                            `<option value="0" disabled selected>Select Floor</option>`
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
                    url: 'edit/' +
                        id + ' /updateFlat/ ',
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#flat').empty();
                        $('#flat').append(
                            `<option value="0" disabled selected>Select Flat</option>`
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
                    url: 'edit/' +
                        id + ' /updateSeat/ ',
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#seat').empty();
                        $('#seat').append(
                            `<option value="0" disabled selected>Select Seat</option>`
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
