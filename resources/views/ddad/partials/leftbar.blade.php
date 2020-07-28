<!-- Start Sidebar Nav -->
<div class="st_side st_fixed_side st_dark_side st_overlay_scroll">
    <div class="st_side_toggle"><span></span></div>
    <div class="st_site_branding">
        <a href="{{ config('dashboard.today') }}" class="st_branding_logo"><img src="{{ asset('assets/img/ddad.png') }}" alt="AdminFold"></a>
    </div>
    <div class="st_side_nav">
        <ul class="st_side_nav_list">

            @if(!Auth::user()->isAdmin())
                <li class="st_side_nav_item">
                    <a href="{{ route('dashboard.index') }}" class="st_side_nav_link @if(request()->is(['ddad/dashboard', 'ddad/index'])) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">dashboard</i></span>
                        <span class="st_side_nav_text">Dashboard</span>
                    </a>
                </li>
                <li class="st_side_nav_item">
                    <a href="{{ route('campaigns.index') }}" class="st_side_nav_link @if(request()->is(['campaigns*'])) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">record_voice_over</i></span>
                        <span class="st_side_nav_text">My campaigns</span>
                    </a>
                </li>

                <li class="st_side_nav_item">
                    <a href="{{ route('accounting.index') }}" class="st_side_nav_link @if(request()->is('ddad/accounting*')) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">local_atm</i></span>
                        <span class="st_side_nav_text">Accounts & Billing</span>
                    </a>
                </li>
            @endif



            @if(Auth::user()->isAdmin())
                <li class="st_side_nav_item">
                    <a href="{{ route('dashboard.index') }}" class="st_side_nav_link @if(request()->is(['ddad/dashboard', 'ddad/index'])) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">dashboard</i></span>
                        <span class="st_side_nav_text">Dashboard</span>
                    </a>
                </li>
                <li class="st_side_nav_item">
                    <a href="{{ route('campaigns.index') }}" class="st_side_nav_link @if(request()->is(['ddad/campaigns*'])) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">record_voice_over</i></span>
                        <span class="st_side_nav_text">Campaigns</span>
                    </a>
                </li>

                <li class="st_side_nav_item st_side_nav_has_children">
                    <a href="#" class="st_side_nav_link @if(request()->is(['ddad/shops*', 'ddad/devices*'])) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">devices</i></span>
                        <span class="st_side_nav_text">Shops & Devices</span>
                        <i class="st_right st_submenu_arrow"><span class="st_submenu_arrow_in"></span></i>
                        <span class="badge badge-danger st_right"></span>
                    </a>
                    <ul class="st_side_nav_submenu" @if(request()->is(['ddad/shops*', 'ddad/devices*'])) style="display: block" @endif>
                        <li><a href="{{ route('shops.index') }}" class="st_side_nav_link">Shops</a></li>
                        <li><a href="{{ route('devices.index') }}" class="st_side_nav_link">Devices</a></li>
                    </ul>
                </li>

                <li class="st_side_nav_item">
                    <a href="{{ route('accounting.index') }}" class="st_side_nav_link @if(request()->is('ddad/accounting*')) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">local_atm</i></span>
                        <span class="st_side_nav_text">Accounts & Billing</span>
                    </a>
                </li>
                <li class="st_side_nav_item">
                    <a href="{{ route('users.index') }}" class="st_side_nav_link @if(request()->is('ddad/users*')) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">people</i></span>
                        <span class="st_side_nav_text">Clients & Users</span>
                    </a>
                </li>
                <li class="st_side_nav_item">
                    <a href="{{ route('zones.index') }}" class="st_side_nav_link  @if(request()->is('ddad/zone*')) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">map</i></span>
                        <span class="st_side_nav_text">Zone Management</span>
                    </a>
                </li>

                <li class="st_side_nav_item">
                    <a href="{{ route('isps.index') }}" class="st_side_nav_link @if(request()->is('ddad/isps*')) active @endif">
                        <span class="st_side_nav_icon"><i class="material-icons-outlined">router</i></span>
                        <span class="st_side_nav_text">ISP List</span>
                    </a>
                </li>

                @include('configuration.leftbar')
            @endif

        </ul>
    </div>
</div>
<!-- End Sidebar Nav -->
