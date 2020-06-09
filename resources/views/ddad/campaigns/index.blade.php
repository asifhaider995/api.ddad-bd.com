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
                            Admin will review your content before publish to the devices.
                        </div>
                        <table id="st_dataTable" class="display">
                            <thead>
                            <tr>
                                <th title="Video queue">V.Q<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th type="Image queue">I.Q<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Title<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                @if(Auth::user()->isAdmin())
                                    <th>Client<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                @endif
                                <th>AutoRenew<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Start<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>End<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Viwes<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Status<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                               <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($campaigns as $campaign)
                                <tr>
                                    <td>{{ $campaign->primary_queue ?: '-' }}</td>
                                    <td>{{ $campaign->secondary_queue ?: '-' }}</td>
                                    <td>{{ $campaign->title }}</td>
                                    @if(Auth::user()->isAdmin())
                                        <td>{{ $campaign->client->company_name ?: $campaign->client->full_name }}</td>
                                    @endif

                                    <td>
                                        @if($campaign->auto_renew)
                                            <span class="text-danger material-icons">close</span>
                                        @else
                                            <span class="text-success material-icons">check</span>
                                        @endif         </td>
                                    <td>{{ formateDate($campaign->starting_date) }}</td>
                                    <td>{{ formateDate($campaign->ending_date) }}</td>

                                    <td>
                                        {{ $campaign->total_views }}
                                    </td>
                                    <td>
                                        @include('ddad.campaigns._status', ['status' => $campaign->status])
                                    </td>
                                    <td>
                                        <div class="st_table_action_btn_wrap">
                                            <button class="st_table_action_btn dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_horiz</i></button>
                                            <div class="dropdown-menu dropdown-size-sm dropdown-menu-right st_boxshadow">
                                                <a class="dropdown-item" href="{{ route('campaigns.show', $campaign) }}"><i class="material-icons-outlined">visibility</i>View</a>
                                                <a class="dropdown-item" href="{{ route('campaigns.edit', $campaign) }}"><i class="material-icons-outlined">create</i>Edit</a>
                                                @if(Auth::user()->isAdmin())
                                                <a class="dropdown-item" href="" onclick="" data-delete_action="{{ route('campaigns.destroy', $campaign) }}"><i class="material-icons-outlined">delete_outline</i>Delete</a>
                                                @endif
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
