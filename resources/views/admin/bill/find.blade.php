@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.bill.generate') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label>Student Id:</label><span class="text-danger">*</span>
                                <select name="student_id" class="custom-select2" style="width: 100%" required value="">
                                    <option value="" selected disabled>
                                        {{ empty($student_id) ? 'Select Student Id' : $student_id }}
                                    </option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->student_id }}"
                                            {{ $student->student_id == $student_id ? 'Selected' : '' }}>
                                            {{ $student->student_id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Select a Date:</label>
                                <input type="month" class="form-control" name="date"
                                    value="{{ empty($date)? Carbon\Carbon::now()->subMonth()->format('Y-m'): $date }}">
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success float-right">Generate Bill</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (Request::routeIs('admin.bill.generate'))
            <div class="page-header">
                <div class="col-md-12">
                    <h4 class="p-2 text-center">Bills of {{ $date }}</h4>
                    <form action="{{ route('admin.bill.update') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12 ">
                                <div class="form-group col-md-2 float-right">
                                    {{-- <label for="">Date: {{ $date }}</label> --}}
                                    <input type="month" class="form-control" name="date" value="{{ $date }}"
                                        hidden>
                                    <input type="number" name="student_id" class="form-control" value="{{ $student_id }}"
                                        hidden>
                                </div>
                            </div>
                            <div class=" form-group col-md-6">
                                <input type="text" class="form-control" readonly placeholder="Hostel Fees:">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">

                                <input type="number" name="hostel_bill" class="form-control" value="{{ $hostel_bill }}"
                                    placeholder="{{ $hostel_bill }}" readonly>
                            </div>
                            <div class=" form-group col-md-6">
                                <input type="text" class="form-control" readonly placeholder="Meal Bill:">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <input type="number" name="meal_bill" class="form-control" value="{{ $meal_bill }}"
                                    placeholder="{{ $meal_bill }}" readonly>
                            </div>

                            @foreach ($other_bills as $other_bill)
                                <div class="col-md-12">
                                    <div class="form-row ">
                                        <div class=" form-group col-md-6">
                                            <input type="text" class="form-control" name="bill_types[]" data -
                                                validation="required" placeholder="{{ $other_bill->service_name }}"
                                                value="{{ $other_bill->service_name }}">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <input type="number" class="form-control" name="amounts[]" data -
                                                validation="required" placeholder="{{ $other_bill->amount }}"
                                                value="{{ $other_bill->amount }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12
                                    inputs-container">
                                <div class="form-row inputs">
                                    <div class=" form-group col-md-6">
                                        <input type="text" class="form-control" name="bill_types[]" data -
                                            validation="required" placeholder="Bill Type">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <input type="number" class="form-control" name="amounts[]" data -
                                            validation="required" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <div class="form-row buttons">
                                    <div class="form-group col-md-6">
                                        <input class="btn btn-warning btn-md float-right addMore" type="button"
                                            value="Add More">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input class="btn btn-danger btn-md float-right deleteLast" type="button"
                                            value="Delete Last">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-success btn-md float-right" type="submit">
                                            <i class="icon-copy dw dw-up-arrow-11">
                                            </i>Update
                                        </button>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <a href="{{ route('admin.bill.download', [$student_id, $date]) }}"
                                            class="btn btn-warning btn-md" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="icon-copy bi bi-box-arrow-down"
                                                style="font-family: dropways, Bangla791, sans-serif;"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        @endif
    @endsection

    @push('js')
        <script>
            $(document).ready(function() {
                $('input').click(function(e) {
                    let inputValue = $(this).val();
                    if (inputValue == "Add More") {
                        $('.inputs:first').clone().appendTo('.inputs-container');
                    } else if (inputValue == "Delete Last") {
                        if ($('.inputs').length > 1) {
                            $('.inputs:last').remove();
                        }
                    }
                });
            });
        </script>
    @endpush
