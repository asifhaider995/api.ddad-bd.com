@extends('ddad.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">ISP list</h2>
                    </div>
                    <div class="st_card_head_right">
                        <button data-toggle="modal" data-target="#isp-create-modal" class="btn btn-primary btn-sm">
                            <i class="material-icons">add</i>Add new ISP
                        </button>
                    </div>
                </div>
                <div class="st_card_body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>Contact Person</th>
                                    <th>Mobile</th>
                                    <th>Package</th>
                                    <th>Rate</th>
                                    <th>Connections</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($isps as $isp)
                                <tr>
                                    <td>{{ $isp->name }}</td>
                                    <td>{{ $isp->contact_person }}</td>
                                    <td>{{ $isp->mobile_number }}</td>
                                    <td>{{ $isp->package_name }}</td>
                                    <td>{{ $isp->package_price }}</td>
                                    <td>{{ $isp->number_of_connections }}</td>
                                    <td>
                                        <div class="st_table_action_btn_wrap">
                                            <button class="st_table_action_btn dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_horiz</i></button>
                                            <div class="dropdown-menu dropdown-size-sm dropdown-menu-right st_boxshadow">
                                                <a class="dropdown-item" href="{{ route('isps.edit', $isp) }}"><i class="material-icons-outlined">create</i>Edit</a>
                                                <a class="dropdown-item" href="" onclick="" data-delete_action="{{ route('isps.delete', $isp) }}"><i
                                                        class="material-icons-outlined">delete_outline</i>Delete</a>
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

    <div class="st_height_15 st_height_lg_15"></div>

    @include('ddad.isps.create-modal', ['after_success' => 'close_modal'])
@endsection

