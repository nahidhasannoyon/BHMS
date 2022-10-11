@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 table-responsive">
                <h3 class="text-info text-center pd-10"><u>Student List</u></h3>
                <table class="table table-striped">
                    <thead>
                        {{-- todo add asc and dec toggleable icon  --}}
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Seat Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            @if ($student->status == 1)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->studentID }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->dept }}</td>
                                    <td>{{ $student->seat_id }}</td>
                                    <td>{{ $student->status }}</td>
                                    <td>
                                        {{-- todo add functionality in these buttons --}}
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="download-student-info"><i
                                                class="icon-copy dw dw-download"></i></a>
                                        {{-- {{ route('student-information.download',$student->id) }} --}}
                                        <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="View"><i
                                                class="icon-copy fi-torsos-female-male"></i></a>
                                        {{-- {{route('student-information.show', $student->id)}} --}}
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Edit"><i
                                                class="icon-copy dw dw-edit-1"></i></a>
                                        {{-- {{route('student-information.edit', $student->id)}} --}}
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"><i
                                                class="icon-copy dw dw-trash1"></i></a>
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
@endsection
