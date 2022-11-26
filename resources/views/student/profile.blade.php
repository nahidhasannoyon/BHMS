@extends('student.layout.master')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/student-profile.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
@endpush()

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="text-center">
            <h4 class="text-blue" style="padding-bottom: 10px"><u>My Profile</u></h4>
        </div>

        <div class="col-md-12">
            <div class="row clearfix">
                <div class="form-row">
                    <div class="col-8">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="name">Name: </label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $student->name }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="id">Id: </label>
                                <input type="text" class="form-control" id="id" name="id"
                                    value="{{ $student->student_id }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="dept">Department: </label>
                                <input type="text" class="form-control" id="dept" name="dept"
                                    value="{{ $student->dept }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="phone">Phone: </label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $student->phone }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="g_phone">Guardian Phone: </label>
                                <input type="text" class="form-control" id="g_phone" name="g_phone"
                                    value="{{ $student->g_phone }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="status">Status: </label>
                                <input type="text" class="form-control" id="status" name="status"
                                    value="{{ $student->status == 1 ? 'Active' : 'Inactive' }}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="building">Building Name:</label>
                                <input type="text" class="form-control" id="building" name="building"
                                    value="{{ $building->name ?? '---' }}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="floor">Floor Number:</label>
                                <input type="text" class="form-control" id="floor" name="floor"
                                    value="{{ $floor->name ?? '---' }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="flat">Flat Number:</label>
                                <input type="text" class="form-control" id="flat" name="flat"
                                    value="{{ $flat->name ?? '---' }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="seat">Seat Number:</label>
                                <input type="text" class="form-control" id="seat" name="seat"
                                    value="{{ $seat->name ?? '---' }}" disabled>
                            </div>
                            <div>
                                <div class="col-xxl-6">
                                    <div class=" px-4 py-5 rounded">
                                        <form action="{{ route('student.profile.update-password') }}" method="post">
                                            @csrf
                                            <div class="form-row g-3">
                                                <div class="col-md-12">
                                                    <h4 class="my-12">Change Password</h4>
                                                    <hr>
                                                </div>
                                                <div class="form-group col-md-6"> <label for="old_password"
                                                        class="form-label">Old
                                                        Password</label> <input type="password" class="form-control"
                                                        id="old_password" name="old_password" placeholder="Old Password"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-6"> <label for="new_password"
                                                        class="form-label">New
                                                        Password</label> <input type="password" class="form-control"
                                                        id="new_password" name="new_password" placeholder="New Password"
                                                        required minlength=6>
                                                </div>
                                                <div class="form-group col-md-6"> <label for="confirm_password"
                                                        class="form-label">Confirm Password</label> <input type="password"
                                                        class="form-control" id="confirm_password"
                                                        name="confirm_password" placeholder="Confirm Password" required
                                                        minlength=6>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">Change
                                                        Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <form method="POST" action="{{ route('student.profile.update-image') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card card-box">
                                <div class="pd-10">
                                    <img id="showImage" class="card-img-top"
                                        src="{{ empty($student->image) ? asset('vendors/images/student-default-pic.jpg') : asset('uploads/student/profile-images/' . $student->image) }} ">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title weight-500">Upload your profile
                                        photo</h5>
                                    <div class="row">
                                        <div class="col-7">
                                            <input type="file" id="image" name="image" hidden="">
                                            <label class="btn btn-outline-success col-6" for="image">Upload</label>
                                        </div>
                                        <div class="col-2">
                                            <button id="remove-image" type="button"
                                                class="btn btn-outline-danger">Remove</button>
                                        </div>
                                        <div class="pl-3 ">
                                            <button id="updateImgBtn" class="btn btn-primary pd-10" type="submit"
                                                disabled>Update
                                                Image</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>

            </div>
        </div>
    @endsection

    @push('js')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    $('#updateImgBtn').removeAttr('disabled');
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
            $(document).ready(function() {
                $('#remove-image').click(function(e) {
                    $('#updateImgBtn').removeAttr('disabled');
                    $('#showImage').attr('src', "{{ asset('vendors/images/student-default-pic.jpg') }}");
                });
            });
        </script>
    @endpush()
