<li class="st_side_nav_item st_side_nav_has_children ">
    <a href="#" class="st_side_nav_link @if(request()->is('configuration/*')) active @endif">
        <span class="st_side_nav_icon"><i class="material-icons">settings</i></span>
        <span class="st_side_nav_text">Configuration</span>
        <i class="st_right st_submenu_arrow"><span class="st_submenu_arrow_in"></span></i>
        <span class="badge badge-danger st_right"></span>
    </a>
    <ul class="st_side_nav_submenu" @if(request()->is('configuration/*')) style="display: block;" @endif>
        <li><a href="{{ route('settings.index') }}" class="st_side_nav_link">Settings</a></li>
        <li><a href="{{ route('environments.index') }}" class="st_side_nav_link">Environments variables</a></li>
        <li><a href="{{ route('permissions.index') }}" class="st_side_nav_link">Permission</a></li>
        <li><a href="{{ route('roles.index') }}" class="st_side_nav_link">Roles</a></li>
    </ul>
</li>
