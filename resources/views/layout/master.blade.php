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

    @include('layout.header')

    @include('layout.sidebar')

    {{-- Main content --}}
    <div class="main-container">
        <div class="pd-ltr-20">
            @yield('content')
            {{-- Footer --}}
            <div class="footer-wrap pd-20 mb-20 mt-5 card-box">
                Hostel Management System by <span class="text-primary">BAIUST</span>
            </div>
        </div>
    </div>
    <!-- js -->
    @include('partial.js.main')
</body>

</html>
