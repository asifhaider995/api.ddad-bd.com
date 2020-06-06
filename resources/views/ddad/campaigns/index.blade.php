@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Campaigns</h2>
                    </div>
                    <div class="st_card_head_right">
                        <a href="{{ route('campaigns.create') }}" class="btn btn-primary btn-sm">
                            <i class="material-icons">add</i>Create New Campaign
                        </a>
                    </div>
                </div>
                <div class="st_card_body">
                    <div class="st_data_table_wrap st_fixed_height1">
                        <div class="st_data_table_btn_group text-info">
                            If you update any information then running campaign will go to awaiting for review status <br>and
                            after approving the content by the admin, campaign will again go to active status.
                        </div>
                        <table id="st_dataTable" class="display">
                            <thead>
                            <tr>
                                <th>ID<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Title<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Client<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Auto renew<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Start<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>End<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Status<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                               <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($campaigns as $campaign)
                                <tr>
                                    <td>{{ $campaign->id }}{{ $campaign }}</td>
                                    <td>{{ $campaign->title }}</td>
                                    <td>{{ optional($campaign->client)->name }}</td>
                                    <td>{{ $campaign->auto_renew }}</td>
                                    <td>{{ $campaign->starting_date }}</td>
                                    <td>{{ $campaign->ending_date }}</td>
                                    <td>{{ $campaign->status }}</td>
                                    <td>
                                        <div class="st_table_action_btn_wrap">
                                            <button class="st_table_action_btn dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_horiz</i></button>
                                            <div class="dropdown-menu dropdown-size-sm dropdown-menu-right st_boxshadow">
                                                <a class="dropdown-item" href="{{ route('campaigns.show', $campaign) }}"><i class="material-icons-outlined">visibility</i>View</a>
                                                <a class="dropdown-item" href="{{ route('campaigns.edit', $campaign) }}"><i class="material-icons-outlined">create</i>Edit</a>
                                                <a class="dropdown-item" href="" onclick="" data-delete_action="{{ route('campaigns.destroy', $campaign) }}"><i class="material-icons-outlined">delete_outline</i>Delete</a>
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
