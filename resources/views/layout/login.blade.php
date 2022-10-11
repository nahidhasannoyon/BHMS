<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }}</title>

    <!-- Site favicon -->
    @include('partial.css.main')

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    @include('partial.font.main')
    <!-- CSS -->

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <!-- End Google Tag Manager -->
</head>

<body>
    {{-- @include('partial.loader.main'); --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12" style="padding: 30px">
                    <h2 class="text-center">Choose Login Option</h2>      
                </div>
                <div class="row mb-30" >
                    <div class=" col-md-2">
                    </div>
                    <div class="col-md-4 ">
                        <div class="card-box text-center" style="background-color: rgb(77, 116, 212)">
                            <img
                            class="card-img-top"
                            src="vendors/images/img3.jfif"
                            alt="Card image cap"
                            />
                            <div class="card-body">
                                <h5 class="card-title text-center">Student Portal</h5>
                                <button class="btn btn-success" type="submit">Student</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card-box text-center" style="background-color: indianred">
                            <img
                            class="card-img-top"
                            src="vendors/images/img3.jfif"
                            alt="Card image cap"
                            />
                            <div class="card-body">
                                <h5 class="card-title text-center">Admin Portal</h5>
                                <button class="btn btn-primary" type="submit">Admin</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 ">
                    </div>
                </div>  
                <div class="text-center">
                    <h4>
                        <a href="{{ route('admin-home') }}">Application For Hostel Seats</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    @include('partial.js.main')
</body>

</html>
