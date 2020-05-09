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
                                <th>ID<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Shop Name<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Owner's Name<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Status<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>TV<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>IOT<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Box<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Average Visit<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Payment Due<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shops as $shop)
                                <tr>
                                    <td><span class="st_table_text">{{ $shop->id }}</span></td>
                                    <td><span class="st_table_text">{{ $shop->name }}</span></td>
                                    <td><span class="st_table_text">{{ $shop->owner_name }}</span></td>
                                    <td>
                                        @if($shop->status === 'active')
                                            <span class="st_text_badge st_text_badge_success">Active</span>
                                        @else
                                            <span class="st_text_badge st_text_badge_danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($shop->tv_id && rand(0,1))
                                            <span class="material-icons text-success">check_circle_outline</span>
                                            <span class="st_table_text">{{ Str::upper($shop->tv_id) }}</span>
                                        @else
                                            <span class="material-icons text-danger">cancel</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($shop->detector_id && rand(0,1))
                                            <span class="st_table_text">{{ Str::upper($shop->detector_id) }}</span>
                                            <span class="material-icons text-success">check_circle_outline</span>
                                        @else
                                            <span class="material-icons text-danger">cancel</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($shop->android_box_id && rand(0,1))
                                            <span class="st_table_text">{{ Str::upper($shop->android_box_id) }}</span>
                                            <span class="material-icons text-success">check_circle_outline</span>
                                        @else
                                            <span class="material-icons text-danger">cancel</span>
                                        @endif
                                    </td>
                                    <td><span class="st_table_text">{{ $shop->average_visit }}</span></td>
                                    <td><span class="st_table_text">{{ $shop->payment_due_date }}</span></td>

                                    <td>
                                        <div class="st_table_action_btn_wrap">
                                            <button class="st_table_action_btn dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_horiz</i></button>
                                            <div class="dropdown-menu dropdown-size-sm dropdown-menu-right st_boxshadow">
                                                <a class="dropdown-item" href=""><i class="material-icons-outlined">visibility</i>View</a>
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

@endsection
