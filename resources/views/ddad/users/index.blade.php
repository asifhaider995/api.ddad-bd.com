@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Clients & Users</h2>
                    </div>
                    <div class="st_card_head_right">
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                            <i class="material-icons">add</i>Create New
                        </a>
                    </div>
                </div>
                <div class="st_card_body">
                    <div class="st_data_table_wrap st_fixed_height1">
                        <div class="st_data_table_btn_group">
                            <div class="st_data_table_btn">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="zone-a" name="zone" class="custom-control-input">
                                    <label class="custom-control-label" for="zone-a" >All</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="zone-a" name="zone" class="custom-control-input">
                                    <label class="custom-control-label" for="zone-a" >Clients</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="zone-a" name="zone" class="custom-control-input">
                                    <label class="custom-control-label" for="zone-a" >Admins</label>
                                </div>

                            </div>
                        </div>
                        <table id="st_dataTable" class="display">
                            <thead>
                            <tr>
                                <th>ID<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Name<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Company<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Role<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Approved<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Campaigns<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Mobile<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->company_name }}</td>
                                    <td>{{ $user->is_client ? 'Client' : "Admin" }}</td>
                                    <td>
                                        @if($user->is_verified)
                                            <span class="text-success material-icons">check</span>
                                        @else
                                            <span class="text-danger material-icons">warning</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->number_of_campaigns ?: 0 }}</td>
                                    <td>{{ $user->mobile_number }}</td>
                                    <td>
                                        <div class="st_table_action_btn_wrap">
                                            <button class="st_table_action_btn dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_horiz</i></button>
                                            <div class="dropdown-menu dropdown-size-sm dropdown-menu-right st_boxshadow">
                                                @if($user->is_client)
{{--                                                    <a class="dropdown-item" href="{{ route('users.show', $user) }}"><i class="material-icons-outlined">visibility</i>View</a>--}}
                                                @endif
                                                <a class="dropdown-item" href="{{ route('users.edit', $user) }}"><i class="material-icons-outlined">create</i>Edit</a>
                                                <a class="dropdown-item" href="" onclick="" data-delete_action="{{ route('users.destroy', $user) }}"><i class="material-icons-outlined">delete_outline</i>Delete</a>
                                            </div>
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
    <div class="st_height_25 st_height_lg_25"></div>
@endsection
