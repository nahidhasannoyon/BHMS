@extends('layout.master')
@stack('css')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Add Student Bill</u></h4>
        </div>
        {{-- {{ route('admin.student.store') }} --}}
        <div class="col-md-12">
            <form action="#" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Choose the type of bill:</label><span class="text-danger">*</span>
                            <select name="typesOfBill" class="custom-select2 form-control typesOfBill"
                                style="width: 100%; height: 38px;" data-validation="required" required>
                                <option selected disabled value>Choose...</option>
                                @foreach ($typesOfBills as $typesOfBill)
                                    <option value="{{ $typesOfBill->id }}">
                                        {{ $typesOfBill->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 inputs-container">
                    <div class="form-row inputs">
                        <div class=" form-group col-md-4">
                            <input type="text" class="form-control" name="studentID" data - validation="required"
                                value="" required placeholder="Student ID">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="date" class="form-control" name="date"
                                min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="number" class="form-control" name="amount" data - validation="required"
                                value="" required placeholder="Amount">
                        </div>
                    </div>
                </div>
                <div class="form-row buttons">
                    <div class="form-group col-md-8">
                        <input class="btn btn-warning btn-md float-right addMore" type="button" value="Add More">
                    </div>
                    <div class="form-group col-md-2">
                        <input class="btn btn-danger btn-md float-right deleteLast" type="button" value="Delete Last">
                    </div>
                    <div class="form-group col-md-2">
                        <button class="btn btn-success btn-md float-right" type="submit">
                            <i class="icon-copy dw dw-up-arrow-11">
                            </i>Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
