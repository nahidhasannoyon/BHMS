@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#add-types-of-bill">
                    <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Add Bills</a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 table-reponsive">
                <h3 class="text-info text-center pd-10"><u>Types of Bill</u></h3>
                <table class="data-table table table-striped">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Amount</td>
                            <td>Status</td>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typesOfBill as $tBill)
                            <tr>
                                <td>{{ $tBill->name }}</td>
                                <td>{{ $tBill->amount }}</td>
                                @if ($tBill->status == Status::Inactive)
                                    <td class="text-danger"><i class="icon-copy ion-close-circled"
                                            aria-hidden="true"></i>Inactive</td>
                                @else
                                    <td class="text-success"><i class="icon-copy fa fa-check-circle"></i>Active</td>
                                @endif
                                <td>
                                    <a href="{{ route('admin.bill.edit', $tBill->id) }}" class="btn btn-warning btn-md"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="icon-copy dw dw-edit-1"
                                            style="font-family: dropways, Bangla791, sans-serif;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="add-types-of-bill" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add New Bill Type From Here:</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.bill.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="">Name:</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="">Amount:</label>
                                        <input type="number" class="form-control" name="amount" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="">Status:</label>
                                        <select name="status" class="form-control" required>
                                            <option selected disabled value>Choose...</option>
                                            <option value="{{ Status::Active->value }}">Active</option>
                                            <option value="{{ Status::Inactive->value }}">Inactive</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success btn-md float-right">
                                            <i class="icon-copy dw dw-add"
                                                style="font-family: dropways, Bangla526, sans-serif;"></i> Add
                                            Bill Type
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
@endsection
