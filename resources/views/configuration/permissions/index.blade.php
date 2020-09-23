@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Permissions</h2>
                    </div>
                </div>
                <div class="st_card_body">
                    <div class="st_data_table_wrap st_fixed_height1">
                        <table id="st_dataTable" class="display">
                            <thead>
                            <tr>
                                <th>Permission name</th>
                                <th style="width: 300px">Any user having any of the following roles has  permission.</th>
                                <th style="width: 300px">The following users also has the permission</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                        <strong>{{ Str::title($permission->name) }}</strong><br>
                                        {{ $permission->guard_name }}
                                    </td>
                                    <td>

                                        @foreach($permission->roles as $role)
                                            <div class="role d-flex justify-content-between">
                                                {{ Str::title($role->name) }}
                                                <span class="hide-default"><a href="{{ route('permissions.detach-role',  [$permission->id, 'role_id' => $role->id]) }}" class="btn btn-danger btn-sm">Detach</a></span>
                                            </div>
                                        @endforeach
                                        <a href="#" class="btn btn-primary btn-sm" data-get_roles_url="{{ route('permissions.attachable-roles', $permission) }}" data-toggle="modal" data-target="#attachRoleModal">Attach role</a>
                                    </td>
                                    <td>
                                        @foreach($permission->users as $user)
                                            <div class="role d-flex justify-content-between">
                                                {{ Str::title($user->name) }}
                                                <span class="hide-default"><a href="{{ route('permissions.detach-user',  [$permission->id, 'user_id' => $user->id]) }}" class="btn btn-danger btn-sm">Detach</a></span>
                                            </div>
                                        @endforeach
                                        <a href="#" class="btn btn-primary btn-sm" data-get_users_url="{{ route('permissions.attachable-users', $permission) }}" data-toggle="modal" data-target="#attachUserModal">Attach user</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('configuration.permissions.partials.attach-roles-modal')
    @include('configuration.permissions.partials.attach-users-modal')

    {{ $permissions->links() }}
@endsection
