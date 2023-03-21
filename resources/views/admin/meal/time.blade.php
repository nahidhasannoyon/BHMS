@extends('admin.layout.master')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <h4 class="p-3 text-center">Admin Meal Times</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Start</th>
                                        <th scope="col">End</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Breakfast</td>
                                        <td><input type="time" name="breakfast_start" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                        <td><input type="time" name="breakfast_end" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td><input type="time" name="lunch_start" min="00:00" max="24:00" required
                                                value="13:30"></td>
                                        <td><input type="time" name="lunch_end" min="00:00" max="24:00" required
                                                value="13:30"></td>
                                    </tr>
                                    <tr>
                                        <td>Dinner</td>
                                        <td><input type="time" name="dinner_start" min="00:00" max="24:00" required
                                                value="13:30"></td>
                                        <td><input type="time" name="dinner_end" min="00:00" max="24:00" required
                                                value="13:30"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success float-right"><i
                                    class="icon-copy dw dw-up-arrow-11" aria-hidden="true"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <h4 class="p-3 text-center">Admin Meal Booking Last Times</h4>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">Last Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Breakfast</td>
                                        <td><select name="status" class="form-control" required>
                                                <option value="{{ Status::Active->value }}">
                                                    Today
                                                    {{-- @if ($typesOfBill->status == Status::Active->value) {{ selected }} @endif>Active --}}
                                                </option>

                                                <option value="{{ Status::Inactive->value }}">
                                                    Previous Day
                                                </option>

                                            </select></td>

                                        <td><input type="time" name="breakfast_last_time" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td><select name="status" class="form-control" required>
                                                <option value="{{ Status::Active->value }}">
                                                    Today
                                                    {{-- @if ($typesOfBill->status == Status::Active->value) {{ selected }} @endif>Active --}}
                                                </option>

                                                <option value="{{ Status::Inactive->value }}">
                                                    Previous Day
                                                </option>

                                            </select></td>

                                        <td><input type="time" name="lunch_last_time" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                    </tr>
                                    <tr>
                                        <td>Dinner</td>
                                        <td><select name="status" class="form-control" required>
                                                <option value="{{ Status::Active->value }}">
                                                    Today
                                                    {{-- @if ($typesOfBill->status == Status::Active->value) {{ selected }} @endif>Active --}}
                                                </option>

                                                <option value="{{ Status::Inactive->value }}">
                                                    Previous Day
                                                </option>

                                            </select></td>

                                        <td><input type="time" name="dinner_last_time" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success float-right"><i
                                    class="icon-copy dw dw-up-arrow-11" aria-hidden="true"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- * Student Meal Booking Last Times and Meal Times --}}
    <div class="page-header">
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <h4 class="p-3 text-center">Student Meal Times</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Start</th>
                                        <th scope="col">End</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Breakfast</td>
                                        <td><input type="time" name="breakfast_start" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                        <td><input type="time" name="breakfast_end" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td><input type="time" name="lunch_start" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                        <td><input type="time" name="lunch_end" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                    </tr>
                                    <tr>
                                        <td>Dinner</td>
                                        <td><input type="time" name="dinner_start" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                        <td><input type="time" name="dinner_end" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success float-right"><i
                                    class="icon-copy dw dw-up-arrow-11" aria-hidden="true"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <h4 class="p-3 text-center">Student Meal Booking Last Times</h4>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">Last Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Breakfast</td>
                                        <td><select name="status" class="form-control" required>
                                                <option value="{{ Status::Active->value }}">
                                                    Today
                                                    {{-- @if ($typesOfBill->status == Status::Active->value) {{ selected }} @endif>Active --}}
                                                </option>

                                                <option value="{{ Status::Inactive->value }}">
                                                    Previous Day
                                                </option>

                                            </select></td>

                                        <td><input type="time" name="breakfast_last_time" min="00:00"
                                                max="24:00" required value="13:30"></td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td><select name="status" class="form-control" required>
                                                <option value="{{ Status::Active->value }}">
                                                    Today
                                                    {{-- @if ($typesOfBill->status == Status::Active->value) {{ selected }} @endif>Active --}}
                                                </option>

                                                <option value="{{ Status::Inactive->value }}">
                                                    Previous Day
                                                </option>

                                            </select></td>

                                        <td><input type="time" name="lunch_last_time" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                    </tr>
                                    <tr>
                                        <td>Dinner</td>
                                        <td><select name="status" class="form-control" required>
                                                <option value="{{ Status::Active->value }}">
                                                    Today
                                                    {{-- @if ($typesOfBill->status == Status::Active->value) {{ selected }} @endif>Active --}}
                                                </option>

                                                <option value="{{ Status::Inactive->value }}">
                                                    Previous Day
                                                </option>

                                            </select></td>

                                        <td><input type="time" name="dinner_last_time" min="00:00" max="24:00"
                                                required value="13:30"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success float-right"><i
                                    class="icon-copy dw dw-up-arrow-11" aria-hidden="true"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
