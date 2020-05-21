@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Zones</h2>
                    </div>
                    <div class="st_card_head_right">
                        <button data-toggle="modal" data-target="#zones-create-modal" class="btn btn-primary btn-sm">
                            <i class="material-icons">add</i>Create New
                        </button>
                    </div>
                </div>
                <div class="st_card_body">
                    <div class="st_data_table_wrap st_fixed_height1">
                        <div class="st_data_table_btn_group">
                            <div class="st_data_table_btn">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="zone-a" name="zone" class="custom-control-input">
                                    <label class="custom-control-label" for="zone-a" >Zone A</label>
                                </div>
                            </div>
                            <div class="st_data_table_btn">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="zone-b" name="zone" class="custom-control-input">
                                    <label class="custom-control-label" for="zone-b" >Zone B</label>
                                </div>
                            </div>
                            <div class="st_data_table_btn">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="zone-c" name="zone" class="custom-control-input">
                                    <label class="custom-control-label" for="zone-c" >Zone C</label>
                                </div>
                            </div>
                        </div>
                        <table id="st_dataTable" class="display">
                            <thead>
                            <tr>
                                <th>Name<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Location<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($zones as $zone)
                                <tr>
                                    <td><span class="st_table_text">{{ Str::upper($zone->name) }}</span></td>
                                    <td><span class="st_table_text">{{ $zone->description }}</span></td>

                                    <td>
                                        <div class="st_table_action_btn_wrap">
                                            <button class="st_table_action_btn dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_horiz</i></button>
                                            <div class="dropdown-menu dropdown-size-sm dropdown-menu-right st_boxshadow">
                                                <a class="dropdown-item" href=""><i class="material-icons-outlined">visibility</i>View</a>
                                                <a class="dropdown-item" href="{{ route('zones.edit', $zone) }}"><i class="material-icons-outlined">create</i>Edit</a>
                                                <a class="dropdown-item" href="" onclick="" data-delete_action="{{ route('zones.destroy', $zone) }}"><i class="material-icons-outlined">delete_outline</i>Delete</a>
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

    @include('ddad.zones.create-modal', ['after_success' => 'reload_page'])
@endsection

