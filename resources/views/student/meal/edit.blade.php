@extends('student.layout.master')
@push('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
@endpush
@section('content')
  <div class="container-fluid">
    <div class="page-header">
      <div class="col-md-12">
        <h4 class="p-2 text-center">Booked Meals</h4>
        <form action="{{ route('student.meal.update', $bookedMeal->id) }}" method="post" id="mealUpdateForm">
          @csrf
          @method('PATCH')
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Date</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <td>
                <input type="text" class="form-control" value="{{ $bookedMeal->date }}" readonly>
              </td>
              <td>
                <input type="number" class="form-control" name="breakfast" id="breakfast" value="{{ $bookedMeal->breakfast }}" min="0">
              </td>
              <td>
                <input type="number" class="form-control" name="lunch" id="lunch" value="{{ $bookedMeal->lunch }}" min="0">
              </td>
              <td>
                <input type="number" class="form-control" name="dinner" id="dinner" value="{{ $bookedMeal->dinner }}" min="0">
              </td>
              <td>
                <button type="button" class="btn btn-success btn-md" onclick="submitForm()">
                  <i class="icon-copy dw dw-add"></i>
                  Update
                </button>
              </td>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
  <script>
    function submitForm() {
      let mealCount = parseInt($("#breakfast").val()) + parseInt($("#lunch").val()) + parseInt($("#dinner").val());
      if (mealCount >= 2) {
        $("#mealUpdateForm").submit();
      } else {
        alert('Wrong input detected in meal count, please check your meal quantities.');
      }
    }
  </script>
@endpush
