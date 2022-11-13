@extends('admin.layout.master')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-md-12"><a href="{{ route('admin.meal.list') }}" class="btn btn-primary btn-md float-left">
                    <i class="icon-copy bi bi-arrow-90deg-left" style="font-family: dropways, Bangla526, sans-serif;"></i>
                    Meals</a>
            </div>
        </div>
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>Edit Meal</u></h4>
        </div>
        <div class="col-md-12">
            <form action="{{ route('admin.meal.update', $meal->id) }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Meal Day:</label><span class="text-danger">*</span>
                            <select name="day" class="custom-select2 form-control" style="width: 100%; height: 38px;"
                                data-validation="required" required>
                                <option selected disabled value>Choose...</option>
                                <option value="Saturday" {{ $meal->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="Sunday" {{ $meal->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                <option value="Monday" {{ $meal->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ $meal->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ $meal->day == 'Wednesday' ? 'selected' : '' }}>Wednesday
                                </option>

                                <option value="Thursday" {{ $meal->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ $meal->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Meal Type:</label><span class="text-danger">*</span>
                            <select name="meal_type" class="custom-select2 form-control" style="width: 100%; height: 38px;"
                                data-validation="required" required>
                                <option selected disabled value>Choose...</option>
                                <option value="Breakfast" {{ $meal->meal_type == 'Breakfast' ? 'selected' : '' }}>Breakfast
                                </option>
                                <option value="Lunch" {{ $meal->meal_type == 'Lunch' ? 'selected' : '' }}>Lunch</option>
                                <option value="Dinner" {{ $meal->meal_type == 'Dinner' ? 'selected' : '' }}>Dinner</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Meal Items:</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="meal_items" required
                                value="{{ $meal->meal_items }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Meal Price:</label><span class="text-danger">*</span>
                            <input type="number" class="form-control" name="price" required value="{{ $meal->price }}">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-md float-right">
                                <i style="font-family: dropways, Bangla526, sans-serif;"></i>
                                Update meal
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
