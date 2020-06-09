@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Campaign: {{ $campaign->title }}
                            @include('ddad.campaigns._status', ['status' => $campaign->status])
                        </h2>
                    </div>

                    <div class="st_card_head_right">
                        @if(Auth::user()->isAdmin())
                            @if($campaign->status == 'awaiting_for_approval')
                                <a  href="{{ route('campaigns.change-status', [$campaign, 'approved']) }}" class="btn btn-success btn-sm">
                                    <i class="material-icons">done_outline</i>Approve
                                </a>

                                <a href="{{ route('campaigns.change-status', [$campaign, 'rejected']) }}" class="btn btn-danger btn-sm">
                                    <i class="material-icons">cancel</i>Reject
                                </a>
                            @elseif($campaign->status == 'approved')
                                <a href="{{ route('campaigns.change-status', [$campaign, 'stopped']) }}" class="btn btn-danger btn-sm">
                                    <i class="material-icons">cancel</i>Stop
                                </a>
                            @elseif($campaign->status == 'stopped')
                                <a href="{{ route('campaigns.change-status',  [$campaign, 'approved']) }}" class="btn btn-success btn-sm">
                                    <i class="material-icons">cancel</i>Start again
                                </a>
                            @elseif($campaign->status == 'expired')
                                <a href="{{ route('campaigns.change-status', $campaign) }}" class="btn btn-success btn-sm">
                                    <i class="material-icons">cancel</i>Renew
                                </a>
                            @endif




                        @endif
                        <a href="{{ route('campaigns.edit', $campaign) }}" class="btn btn-primary btn-sm">
                            <i class="material-icons">create</i>Edit
                        </a>
                    </div>
                </div>
                <div class="st_card_body">

                        <div class="st_card_padd_25">



                            <div class="row">


                                <div class="col-lg-7">


                                    <div class="st_height_15 st_height_lg_15"></div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5" style="min-height: auto">
                                                <div class="st_iconbox_title">TV Count</div>
                                                <div class="st_iconbox_number" id="tv_count">{{ $campaign->countTV() }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5" style="min-height: auto">
                                                <div class="st_iconbox_title" title="Discounted price">D.PRICE(TK)</div>
                                                <div class="st_iconbox_number" id="total_price">{{ (int) $campaign->discounted_price }}</div>
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5" style="min-height: auto">
                                                <div class="st_iconbox_title">Views</div>
                                                <div class="st_iconbox_number" id="total_price">{{ $campaign->totalViews }}</div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="st_height_15 st_height_lg_15"></div>

                                    <div class="preview">
                                        <div class="title">Video - Queue {{ $campaign->primary_queue }}</div>
                                        <div class="body">
                                            <video style="width: 100%; height: auto;" controls>
                                                <source src="{{ $campaign->primary_src }}" type="video/mp4">
                                                <source src="{{ $campaign->primary_src }}" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                    <div class="st_height_25 st_height_lg_25"></div>


                                    <div class="preview">
                                        <div class="title">Image - Queue {{ $campaign->primary_queue }}</div>
                                        <div class="body">
                                            @if($campaign->secondary_src)
                                            <video style="width: 100%; height: auto;" controls>
                                                <source src="{{ $campaign->secondary_src }}" type="video/mp4">
                                                <source src="{{ $campaign->secondary_src }}" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                            @else
                                            <h1>Unavailable</h1>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="st_height_25 st_height_lg_25"></div>

                                </div>
                                <div class="col-sm-1 st_npcsf"></div>
                                <div class="col-lg-4">

                                    <div class="st_height_25 st_height_lg_25"></div>

                                    <div class="st_level_up form-group">
                                        <label for="title">Campaign title </label>
                                        <input class="form-control" value="{{ $campaign->title }}" >
                                    </div>

                                    @if(Auth::user()->isAdmin())
                                        <div class="st_level_up form-group">
                                            <label for="title">Client</label>
                                            <input class="form-control" value="{{ $campaign->client->full_name }}@if($campaign->client->company_name)-{{ $campaign->client->company_name }} @endif" >
                                        </div>
                                    @endif

                                    <div class="st_level_up form-group">
                                        <label for="title">Package</label>
                                        <input class="form-control" value="{{ $campaign->package->name }} {{ $campaign->package->duration }}sec, {{ $campaign->package->rate }} taka/Day/TV" >
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group active1">
                                                <label for="starting_date">Starting date*</label>
                                                <input class="form-control" value="{{ formateDate($campaign->starting_date) }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="st_level_up form-group active1">
                                                <label for="starting_date">Ending date*</label>
                                                <input class="form-control" value="{{ formateDate($campaign->ending_date) }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="st_level_up form-group active1">
                                        <label for="locations">Target locations</label>
                                        <textarea  class=" form-control" style="height: 92px;" rows="5">{{ $campaign->locations->pluck('name')->join(',') }}</textarea>

                                    </div>


                                    @if(Auth::user()->isAdmin())
                                        <div>
                                            <div class="st_level_up form-group">
                                                <label for="address">Reviewer note</label>
                                                <textarea  class=" form-control" style="height: 92px;" rows="5">{{ $campaign->reviewer_note }}</textarea>
                                            </div>
                                        </div>
                                    @endif





                                    <div class="st_height_15 st_height_lg_15"></div>

                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="auto_renew" name="auto_renew" @if(old('auto_renew', $campaign->auto_renew)) checked @endif)>
                                            <label class="custom-control-label" for="customCheck1">Auto renew this campaign</label>
                                        </div>
                                    </div>
                                    <div class="st_height_20 st_height_lg_20"></div>

                                </div>


                            </div>

                            <hr>
                            <div class="st_height_25 st_height_lg_25"></div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <div class="st_height_25 st_height_lg_25"></div>
@endsection
