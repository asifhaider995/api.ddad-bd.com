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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Locations<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Number of shops<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($zones as $zone)
                                <tr>
                                    <td>{{ Str::upper($zone->name) }}</td>
                                    <td>{{ $zone->description }}</td>
                                    <td>{{ $zone->numberOfShops }}</td>

                                    <td>
                                        <div class="st_table_action_btn_wrap">
                                            <button class="st_table_action_btn dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_horiz</i></button>
                                            <div class="dropdown-menu dropdown-size-sm dropdown-menu-right st_boxshadow">
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

    @include('ddad.zones.create-modal', ['after_success' => 'reload_page'])
@endsection

