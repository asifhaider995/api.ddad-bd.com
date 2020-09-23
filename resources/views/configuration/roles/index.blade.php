@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Roles</h2>
                    </div>
                </div>
                <div class="st_card_body">
                    <div class="st_data_table_wrap st_fixed_height1">
                        <table id="st_dataTable" class="display">
                            <thead>
                            <tr>
                                <th style="width: 300px">Name</th>
                                <th>Permissions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>
                                        <strong>{{ Str::title($role->name) }}</strong><br>
                                        <span class="code-block">{{ $role->guard_name }}</span>
                                    </td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            <span class="badge badge-secondary ">{{ $permission->name }} <a href="{{ route('roles.detach-permission',  [$role->id, 'permission_id' => $permission->id]) }}" class="badge badge-warning"><i class="material-icons">cancel</i></a></span>
                                        @endforeach
                                        <div class="text-right">
                                            <a href="#" class="btn btn-primary btn-sm" data-get_permissions_url="{{ route('roles.attachable-permissions', $role) }}" data-toggle="modal" data-target="#attachPermissionModal">Attach Permission</a>
                                        </div>
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

    @include('configuration.roles.partials.attach-permissions-modal')

    {{ $roles->links() }}
@endsection
