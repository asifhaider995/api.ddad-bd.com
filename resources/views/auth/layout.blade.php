
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <!-- Page Title -->
    <title>Log In</title>
    <!-- Favicon Icon -->
    <!-- <link rel="icon" href="../assets/img/favicon.png" /> -->
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.4.1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/material-icons/css/material-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/OverlayScrollbars-master/css/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
<div class="st_full_screen st_style1">
    <div class="st_forms_wrap st_style1 st_type1">
        <div class="st_vertical_middle">
            <div class="st_vertical_middle_in">

{{--                <div class="st_form_logo">--}}
{{--                    <img src="{{ asset('assets/img/form_logo2.png') }}" alt="logo">--}}
{{--                </div>--}}
                @yield('content')
{{--                <div class="st_form_copyright">--}}
{{--                    <div class="st_form_copyright_text">© 2020 AdminFold. All Right Reserved.</div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    @if(Route::currentRouteName() == 'register')
        <div class="st_form_image_section st_style1" style="background-image: url( {{ asset('assets/img/forms/bg1.svg') }});">
            <div class="st_form_shape st_style1"><img src="{{ asset('assets/img/forms/shape1.png') }}" alt="Shape"></div>
            <div class="st_form_img"><img src="{{ asset('assets/img/forms/img2.png') }}" alt="Form Image"></div>
        </div>
    @else
        <div class="st_form_image_section st_style1" style="background-image: url({{ asset('assets/img/forms/bg1.svg') }});">
            <div class="st_form_shape st_style1"><img src="{{ asset('assets/img/forms/shape1.png') }}" alt="Shape"></div>
            <div class="st_form_img"><img src="{{ asset('assets/img/forms/img1.png') }}" alt="Form Image"></div>
        </div>
    @endif
</div><!-- .st_full_screen -->

<!-- Scripts -->
<script src="{{ asset('plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-4.4.1/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/OverlayScrollbars-master/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</html>
