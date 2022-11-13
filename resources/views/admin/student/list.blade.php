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
                                @else
                                    <td class="text-danger"> Inactive </td>
                                @endif
                                <td>
                                    <a href="{{ route('admin.student.view', $student->id) }}" class="btn btn-success btn-sm"
                                        data-toggle="tooltip" data-placement="bottom" title="View"><i
                                            class="bi bi-eye"></i></a>
                                    <a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-warning btn-sm"
                                        data-toggle="tooltip" data-placement="bottom" title="Edit"><i
                                            class="icon-copy dw dw-edit-1"></i></a>
                                    <a href="{{ route('admin.student.delete', $student->id) }}"
                                        class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom"
                                        title="Delete"
                                        onclick="return confirm('Are you sure to delete this Student info?')"><i
                                            class="icon-copy dw dw-trash1"></i></a>
                                    <a href="{{ route('admin.student.download', $student->id) }}"
                                        class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                        title="download-student-info"><i class="icon-copy dw dw-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
