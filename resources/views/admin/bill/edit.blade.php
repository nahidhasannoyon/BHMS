@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.bill.update', $typesOfBill->id) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" name="name" required
                                value="{{ $typesOfBill->name }}">
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label for="">Amount:</label>
                            <input type="number" class="form-control" name="amount" required
                                value="{{ $typesOfBill->amount }}">
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label for="">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="{{ Status::Active->value }}"
                                    @if ($typesOfBill->status == Status::Active->value) {{ selected }} @endif>Active</option>

                                <option value="{{ Status::Inactive->value }}"
                                    @if ($typesOfBill->status == Status::Inactive->value) {{ selected }} @endif>Inactive</option>

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-md float-right">
                                <i class="icon-copy dw dw-add" style="font-family: dropways, Bangla526, sans-serif;"></i>
                                Update
                                Bill Type
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
