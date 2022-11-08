@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12 table-responsive">
                <h3 class="text-info text-center pd-10"><u>Student List</u></h3>
                <table class="data-table table table-striped">
                    <thead>
                        {{-- todo add asc and dec toggleable icon  --}}
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->name }}</td>
                                @if ($student->status == 1)
                                    <td class="text-success"> Active </td>
                                @elseif($student->status == 2)
                                    <td class="text-secondary"> Inactive </td>
                                @elseif($student->status == 3)
                                    <td class="text-warning"> Cancelled </td>
                                @else
                                    <td class="text-danger"> Left </td>
                                @endif
                                <td>
                                    {{-- todo add functionality in these buttons --}}
                                    <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip"
                                        data-placement="bottom" title="download-student-info"><i
                                            class="icon-copy dw dw-download"></i></a>
                                    {{-- {{ route('student-information.download',$student->id) }} --}}
                                    <a href="{{ route('view_student', $student->id) }}" class="btn btn-success btn-sm"
                                        data-toggle="tooltip" data-placement="bottom" title="View"><i
                                            class="icon-copy fi-torsos-female-male"></i></a>

                                    <a href="{{ route('edit_student', $student->id) }}" class="btn btn-warning btn-sm"
                                        data-toggle="tooltip" data-placement="bottom" title="Edit"><i
                                            class="icon-copy dw dw-edit-1"></i></a>
                                    {{-- {{route('student-information.edit', $student->id)}} --}}
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                        data-placement="bottom" title="Delete"><i class="icon-copy dw dw-trash1"></i></a>
                                    {{-- {{ route('student-information.destroy',$student->id)}} --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
