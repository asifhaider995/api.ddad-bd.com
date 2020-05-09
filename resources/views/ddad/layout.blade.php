
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <!-- Page Title -->
    <title>Dashboard</title>
    <!-- Favicon Icon -->
    <!-- <link rel="icon" href="assets/img/favicon.png" /> -->
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.4.1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/material-icons/css/material-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/OverlayScrollbars-master/css/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select-1.13.9/dist/css/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/dataTable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/ddad.css') }}" />
</head>

<body class="st_gray_bg">
<!-- Start Header Section -->
<header class="st_site_header st_style1 st_sticky_header">
    <div class="st_main_header">
        <div class="st_main_header_in">
            @include('ddad.partials.header-services')
            <div class="st_header_toolbox">
                <ul class="st_header_toolbox_list">
                    <li>
                        <div class="st_toolbar_icon dropdown-toggle" data-toggle="dropdown"><i class="material-icons-outlined">apps</i></div>
                        @include('ddad.partials.header-quick-links')
                    </li>
                    <li>
                        <div class="st_toolbar_icon dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons-outlined">notifications</i>
                            <span class="st_get_notic"></span>
                        </div>
                        @include('ddad.partials.header-notifications')
                    </li>

                    <li>
                        <div class="st_user_toolbox st_style1">
                            <div class="st_user_toolbox_btn dropdown-toggle" data-toggle="dropdown">
                                <div class="st_user_toolbox_info">
                                    <h3>{{ Auth::user()->name }}</h3>
                                    <span>Available</span>
                                </div>
                                <div class="st_toolbox_user_box st_indigo_box st_radius_4"><img src="{{ asset('assets/img/users/user1.jpg') }}" alt="User"></div>
                            </div>
                            <div class="dropdown-menu dropdown-size-md dropdown-menu-right st_boxshadow">
                                <a class="dropdown-item" href="#"><i class="material-icons-outlined">account_circle</i>View Profile</a>
                                <a class="dropdown-item" href="#"><i class="material-icons-outlined">settings</i>Settings</a>
                                <a class="dropdown-item" href="#"><i class="material-icons-outlined">help_outline</i>Help</a>
                                <a class="dropdown-item" href="#"><i class="material-icons-outlined">assignment</i>Billing</a>
                                <div class="st_dropdown_divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="material-icons-outlined">exit_to_app</i>Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- .st_main_header -->

</header>
<!-- End Header Section -->

@include('ddad.partials.leftbar');

<!-- Start Content -->
<div class="tw-content st_style1">
    <div class="container-fluid">
        @include('flash::message')
        @yield('content')
    </div>
    <!-- Start Footer -->
    <footer class="st_footer">
        <div class="container-fluid">
            <div class="st_footer_in">
                <div class="st_footer_left">
                    <div class="st_copyright">
                        © 2020 DDAD. All rights reserved.
                    </div>
                </div>
                <div class="st_footer_right">
                    <div class="st_footer_nav">
                        <a href="#">About</a>
                        <a href="#">Terms & Privacy</a>
                        <a href="#">Help</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</div>
@include('ddad.partials.confirm-delete')
<!-- End Start Content -->
<!-- Scripts -->
<script src="{{ asset('plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-4.4.1/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/OverlayScrollbars-master/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-select-1.13.9/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('plugins/dataTable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="{{ asset('js/ddad.js') }}"></script>

@stack('script')
</body>
</html>
