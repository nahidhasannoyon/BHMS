@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-meal-type">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add Bills</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12">
                <h3 class="text-info text-center pd-10"><u>Monthly Bills</u></h3>
                <table class="data-table table hover data-table-export nowrap">
                    <thead>
                        <tr>
                            {{--  todo add asc and dec icon to sort --}}
                            <td>#</td>
                            <td>Student ID</td>
                            <td>Date</td>
                            <td>Amount</td>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $bill)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bill->studentID }}</td>
                                <td>{{ $bill->date }}</td>
                                <td>{{ $bill->amount }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-md" data-toggle="tooltip"
                                        data-placement="top" title="Edit"><i class="icon-copy dw dw-edit-1"
                                            style="font-family: dropways, Bangla791, sans-serif;"></i></a>
                                    {{-- {{ route('monthly-bills.edit', $bill->id) }} --}}
                                    <a href="#" class="btn btn-danger btn-md" data-toggle="tooltip"
                                        data-placement="top" title="Delete"
                                        onclick="return confirm('Are you sure to delete this item from the list?')"><i
                                            class="icon-copy dw dw-trash1"
                                            style="font-family: dropways, Bangla791, sans-serif;"></i></a>
                                    {{-- {{ route('monthly-bills.destroy', $bill->id) }} --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
