@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Shops</h2>
                    </div>
                    <div class="st_card_head_right">
                        <a href="{{ route('shops.create') }}" class="btn btn-primary btn-sm">
                            <i class="material-icons">add</i>Create New
                        </a>
                    </div>
                </div>
                <div class="st_card_body">
                    <div class="st_data_table_wrap st_fixed_height1">
                        <div class="st_data_table_btn_group">
                            @foreach($zones as $zone)
                                <div class="st_data_table_btn">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="zone-a" name="zone" class="custom-control-input">
                                        <label class="custom-control-label" for="zone-a" >{{ $zone->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <table id="st_dataTable" class="display">
                            <thead>
                            <tr>
                                <th>ID<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Store<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Location<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Android<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>IOT<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>TV<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Average Visit<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>PaymentRate<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shops as $shop)
                                <tr>
                                    <td>{{ $shop->id }}</td>
                                    <td>{{ $shop->name }}</td>
                                    <td>{{ $shop->location->name }}</td>

                                    @if($shop->device_id)
                                        <td>
                                            @if($shop->device->androidAlerts())
                                                <span class="text-danger material-icons">warning</span>
                                            @else
                                                <span class="text-success material-icons">check</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($shop->device->detectorAlerts())
                                                <span class="text-danger material-icons">warning</span>
                                            @else
                                                <span class="text-success material-icons">check</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($shop->device->tvAlerts())
                                                <span class="text-danger material-icons">warning</span>
                                            @else
                                                <span class="text-success material-icons">check</span>
                                            @endif
                                        </td>
                                    @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    @endif

                                    <td>{{ $shop->average_visit ?: '-' }}</span></td>
                                    <td>{{ $shop->payment_per_ad ?: '-' }}</span></td>

                                    <td>
                                        <div class="st_table_action_btn_wrap">
                                            <button class="st_table_action_btn dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_horiz</i></button>
                                            <div class="dropdown-menu dropdown-size-sm dropdown-menu-right st_boxshadow">
                                                <a class="dropdown-item" href="{{ route('shops.show', $shop) }}"><i class="material-icons-outlined">visibility</i>View</a>
                                                <a class="dropdown-item" href="{{ route('shops.edit', $shop) }}"><i class="material-icons-outlined">create</i>Edit</a>
                                                <a class="dropdown-item" href="" onclick="" data-delete_action="{{ route('shops.destroy', $shop) }}"><i class="material-icons-outlined">delete_outline</i>Delete</a>
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
