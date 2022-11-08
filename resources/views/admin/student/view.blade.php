@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h4 class="text-primary text-center p-3">Student Profile</h4>
                <span class="user-icon">
                    <img class="rounded-circle  mx-auto d-block" src="{{ asset('vendors/images/admin.png') }}" alt=""
                        style="border:1px solid;" height="200" width="200">
                </span>
                <hr>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Student ID: </td>
                            <td>{{ $student->student_id }}</td>
                        </tr>
                        <tr>
                            <td>Student Name: </td>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <td>Department: </td>
                            <td>{{ $student->dept }}</td>
                        </tr>
                        <tr>
                            <td>Contact Number: </td>
                            <td>{{ $student->phone }}</td>
                        </tr>
                        <tr>
                            <td>Guardian Number: </td>
                            <td>{{ $student->g_phone }}</td>
                        </tr>
                        <tr>
                            <td>Hostel Building: </td>
                            <td>{{ $student->building }}</td>
                        </tr>
                        <tr>
                            <td>Hostel Floor: </td>
                            <td>{{ $student->floor }}</td>
                        </tr>
                        <tr>
                            <td>Hostel Flat: </td>
                            <td>{{ $student->flat }}</td>
                        </tr>
                        <tr>
                            <td>Hostel Seat: </td>
                            <td>{{ $student->seat }}</td>
                        </tr>
                        <tr>
                            <td>Status: </td>
                            @if ($student->status == 1)
                                <td class="text-success"> Active </td>
                            @elseif($student->status == 2)
                                <td class="text-secondary"> Inactive </td>
                            @elseif($student->status == 3)
                                <td class="text-warning"> Cancelled </td>
                            @else
                                <td class="text-danger"> Left </td>
                            @endif
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
