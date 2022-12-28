@extends('admin.layout.master')

@section('content')
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Today's Meal Overview</h2>
        </div>

        <div class="row pb-10">
            <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap h-100">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">
                                {{ $total_breakfast }}
                            </div>
                            <div class="font-18 text-secondary weight-500">
                                {{ $breakfast_items }}
                            </div>
                        </div>
                        <div class="widget-icon ">
                            <div class="icon" style="color: rgb(247, 145, 104);">
                                <i class="icon-copy bi bi-sunrise"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap h-100">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $total_lunch }}
                            </div>
                            <div class="font-18 text-secondary weight-500">
                                {{ $lunch_items }}
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" style="color: rgb(255, 211, 91);">
                                <i class="icon-copy bi bi-sun"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap h-100">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $total_dinner }}</div>
                            <div class="font-18 text-secondary weight-500">
                                {{ $dinner_items }}
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon">
                                <i class="icon-copy bi bi-moon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="title pb-20">
            <h2 class="h3 mb-0">Hostel Overview</h2>
        </div>

        <div class="row pb-10">
            <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap h-100">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">
                                {{ $total_student }}
                            </div>
                            <div class="font-18 text-secondary weight-500">
                                Total Student
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" style="color: rgb(247, 145, 104);">
                                <i class="icon-copy bi bi-sunrise"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap h-100">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">{{ $total_stuff }}
                            </div>
                            <div class="font-18 text-secondary weight-500">
                                Total Stuff
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" style="color: rgb(255, 211, 91);">
                                <i class="icon-copy bi bi-sun"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap h-100">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">
                                <span class="text-success">{{ $available_seat }}</span> / <span
                                    class="text-info">{{ $total_seat }}</span>

                            </div>
                            <div class="font-18 text-secondary weight-500">
                                Available / Total Seat
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon">
                                <i class="icon-copy bi bi-moon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
