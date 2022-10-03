@extends('layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-meal-type">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add Bills</a>
                <div class="modal fade bs-example-modal-lg" id="add-meal-type" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Add Student New Bill From Here:</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('monthly-bills') }}" method="post">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="">Date:</label>
                                                    <input type="date" class="form-control" name="date" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Student ID:</label>
                                                    <input type="text" class="form-control" name="studentID" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Amount:</label>
                                                    <input type="number" class="form-control" name="amount" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success btn-md float-right">
                                                        <i class="icon-copy dw dw-add"
                                                            style="font-family: dropways, Bangla526, sans-serif;"></i> Add
                                                        Bill
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12">
                <h3 class="text-info text-center pd-10"><u>Monthly Bills</u></h3>
                <table class="table hover data-table-export nowrap">
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
