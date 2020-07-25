@extends('ddad.layout')
@section('content')
        <div class="st_page_header st_style1">
            <div class="st_page_header_left">
                <h1 class="st_page_header_title">Overview</h1>
                <p class="st_page_header_subtitle">Welcome to Dashboard Template.</p>
            </div>
            <div class="st_page_header_right">
                <div class="st_page_header_btn_group">
                    <a href="#" class="btn change-to-dark btn-outline-light st_icon_btn change-mode"><i class="material-icons">refresh</i><span>Dark mode</span></a>
                    <a href="{{ route('dashboard.forcast') }}" class="btn btn-outline-light"><i class="material-icons-outlined">analytics</i>Today</a>
                    <a href="{{ route('dashboard.playlist') }}" class="btn btn-primary"><i class="material-icons-outlined">queue_music</i>Playlist</a>
                </div>
            </div>
        </div>
        <div class="st_height_30 st_height_lg_30"></div>
        <div class="row">
            <div class="col-lg-8">
                <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
{{--                    <div class="st_card_head">--}}
{{--                        <div class="st_card_head_left">--}}
{{--                            <h2 class="st_card_title">Reprot--}}
{{--                                @if($campaign)--}}
{{--                                    of {{ $campaign->title }}--}}
{{--                                @endif--}}
{{--                            </h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="st_card_body">
                        <div class="st_height_15 st_height_lg_15"></div>
                        <div class="st_padd_lr_25">
                            <div class="st_card_nav st_style1">
                                <a href="{{ route('dashboard.index') }}" class="@if(!$zone) active @endif">All</a>
                                @foreach($zones as $z)
                                    <a class="@if(optional($zone)->id == $z->id) active @endif" href="{{ route('dashboard.index', ['zone_id' => $z->id]) }}">{{ $z->name }}</a>
                                @endforeach
                            </div>

                            @if($zone )

                                <div class="st_card_nav st_style1">
                                    @foreach($zone->locations as $l)
                                        @if(in_array($l->id, $locationIds))
                                            <a class="@if(optional($location)->id == $l->id) active @endif" href="{{ route('dashboard.index', ['zone_id' => $zone->id, 'location_id' => $l->id]) }}">{{ $l->name }}</a>
                                        @endif
                                    @endforeach
                                </div>

                                @if($location && Auth::user()->isAdmin())
                                    <div class="st_card_nav st_style1" style="overflow-x: scroll">
                                        @foreach($location->shops as $s)
                                            <a class="@if(optional($shop)->id == $s->id) active @endif" href="{{ route('dashboard.index', ['zone_id' => $zone->id, 'location_id' => $location->id, 'shop_id' => $s->id]) }}">{{ $s->name }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            @endif


                            <div class="st_height_20 st_height_lg_20"></div>
                            <div class="st_chart_box st_style1">
                                <div class="st_chart_box_left">
                                    <div class="st_chart_title st_style1">Visits</div>
                                    <div class="st_height_10 st_height_lg_10"></div>
                                    <div class="st_chart_wrap st_style2">
                                        <div class="st_chart_wrap_left">
                                            <div class="st_chart_nav st_style1">
                                                @foreach(['hourly','daily','weekly','monthly'] as $rb)
                                                    <a class="@if(in_array(request()->rb, ['daily','weekly','monthly'])) @if(request()->rb == $rb) active @endif @elseif($rb == 'hourly') active @endif" href="{{ route('dashboard.index', ['zone_id' => optional($zone)->id, 'location_id' => optional($location)->id, 'shop_id' => optional($shop)->id, 'rb'=> $rb]) }}">{{ ucfirst($rb) }}</a>
                                                @endforeach
                                            </div>
                                            <div>
                                                <div style="height:150px">
                                                    <canvas  id="st_chart5_4"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="st_chart_wrap_right">
                                            <div class="st_chart_counter st_style1 st_purple_box st_radius_5">
                                                <h3 class="st_chart_counter_title">TOTAL VISITS</h3>
                                                <div class="st_chart_counter_number">{{ $totalVisit }}</div>
                                            </div>
                                            <div class="st_chart_counter st_style1 st_purple_box st_radius_5">
                                                <h3 class="st_chart_counter_title">AVERAGE VISITS</h3>
                                                <div class="st_chart_counter_number">{{ $averageVisit }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .st_chart_box_left -->
                                <div class="st_chart_box_right">
                                    <div class="st_chart_title st_style1">RATE OF AUDIENCE</div>
                                    <div class="st_height_10 st_height_lg_10"></div>
                                    <div class="st_chart_wrap st_style1" style="height:175px;">
                                        <canvas  id="st_chart3_1"></canvas>
                                        <div class="st_doughnut_center">
                                            <div class="st_doughnut_percentage">{{ $perform }}%</div>
                                            <div class="st_doughnut_title">{{ $title }}</div>
                                        </div>
                                    </div>
                                </div><!-- .st_chart_box_right -->
                            </div>
                            <div class="st_height_25 st_height_lg_25"></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="st_iconbox st_style2">
                                        <div class="st_iconbox_icon">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80.13 80.13" xml:space="preserve">
                          <g>
                              <path d="M48.355,17.922c3.705,2.323,6.303,6.254,6.776,10.817c1.511,0.706,3.188,1.112,4.966,1.112
                              c6.491,0,11.752-5.261,11.752-11.751c0-6.491-5.261-11.752-11.752-11.752C53.668,6.35,48.453,11.517,48.355,17.922z M40.656,41.984
                              c6.491,0,11.752-5.262,11.752-11.752s-5.262-11.751-11.752-11.751c-6.49,0-11.754,5.262-11.754,11.752S34.166,41.984,40.656,41.984
                              z M45.641,42.785h-9.972c-8.297,0-15.047,6.751-15.047,15.048v12.195l0.031,0.191l0.84,0.263
                              c7.918,2.474,14.797,3.299,20.459,3.299c11.059,0,17.469-3.153,17.864-3.354l0.785-0.397h0.084V57.833
                              C60.688,49.536,53.938,42.785,45.641,42.785z M65.084,30.653h-9.895c-0.107,3.959-1.797,7.524-4.47,10.088
                              c7.375,2.193,12.771,9.032,12.771,17.11v3.758c9.77-0.358,15.4-3.127,15.771-3.313l0.785-0.398h0.084V45.699
                              C80.13,37.403,73.38,30.653,65.084,30.653z M20.035,29.853c2.299,0,4.438-0.671,6.25-1.814c0.576-3.757,2.59-7.04,5.467-9.276
                              c0.012-0.22,0.033-0.438,0.033-0.66c0-6.491-5.262-11.752-11.75-11.752c-6.492,0-11.752,5.261-11.752,11.752
                              C8.283,24.591,13.543,29.853,20.035,29.853z M30.589,40.741c-2.66-2.551-4.344-6.097-4.467-10.032
                              c-0.367-0.027-0.73-0.056-1.104-0.056h-9.971C6.75,30.653,0,37.403,0,45.699v12.197l0.031,0.188l0.84,0.265
                              c6.352,1.983,12.021,2.897,16.945,3.185v-3.683C17.818,49.773,23.212,42.936,30.589,40.741z"/>
                          </g>
                        </svg>
                                        </div>
                                        <div class="st_iconbox_meta">
                                            <div class="st_iconbox_title">Forecasted total audience</div>
                                            <div class="st_iconbox_number st_purple_color">{{ $forcastedTotal }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="st_iconbox st_style2">
                                        <div class="st_iconbox_icon">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 445.44 445.44" xml:space="preserve">
                          <g>
                              <path d="M404.48,108.288H247.808l79.36-78.336l-14.336-14.336L230.4,96.512l-82.432-81.408L133.632,29.44l79.36,78.336H40.96
                              c-22.528,0-40.96,18.432-40.96,40.96v240.64c0,22.528,18.432,40.96,40.96,40.96h363.52c22.528,0,40.96-18.432,40.96-40.96v-240.64
                              C445.44,126.72,427.008,108.288,404.48,108.288z M276.48,336.64c0,16.896-13.824,30.72-30.72,30.72H87.04
                              c-16.896,0-30.72-13.824-30.72-30.72V203.52c0-16.896,13.824-30.72,30.72-30.72h158.72c16.896,0,30.72,13.824,30.72,30.72V336.64z
                               M353.28,355.072c-19.968,0-35.84-15.872-35.84-35.84c0-19.968,15.872-35.84,35.84-35.84s35.84,15.872,35.84,35.84
                              C389.12,339.2,373.248,355.072,353.28,355.072z M394.24,251.136h-81.92v-20.48h81.92V251.136z M394.24,199.936h-81.92v-20.48
                              h81.92V199.936z"/>
                          </g>
                        </svg>
                                        </div>
                                        <div class="st_iconbox_meta">
                                            <div class="st_iconbox_title">Active TV</div>
                                            <div class="st_iconbox_number st_green_color">{{ $numberOfTv[1] }}/{{ $numberOfTv[0] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="st_height_15 st_height_lg_15"></div>
                    </div>
                </div>
                <div class="st_height_15 st_height_lg_15"></div>

                <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                        <div class="st_card_body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Campaigns</th>
                                    <th>Total payment (mins)</th>
                                    <th>Frequency</th>
                                    <th>Total visits</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($campaigns as $c)
                                    <tr style="cursor: pointer" class="clickable-row" data-href="{{ route('dashboard.index', ['campaign_id' => $c->id == optional($campaign)->id ? null : $c->id]) }}">
                                        <td>
                                            <div class="st_table_media st_style1">
                                                <div class="st_table_media_info">
                                                    <h2 class="st_media_title"><a href="{{ route('dashboard.index', ['campaign_id' => $c->id == optional($campaign)->id ? null : $c->id]) }}">{{ $c->title }}</a></h2>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="st_table_media st_style1 st_type1">
                                                <div class="st_table_media_info">
                                                    <h2 class="st_media_title"><a href="#">{{ intval($c->getTotalPlayedTime()/ 60) }}</a></h2>
                                                    <div class="st_media_subtitle">OF {{ intval($c->getTotalPurchasedPlaytime()) }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="st_table_media st_style1 st_type1">
                                                <div class="st_table_media_info">
                                                    <h2 class="st_media_title"><a href="#">{{ $c->getTotalFrequency() }}</a></h2>
                                                    <div class="st_media_subtitle">OF {{ $c->getTotalPurchasedFrequency() }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="st_table_text">{{ $c->totalVisit() }}</div>
                                        </td>
                                        <td>
                                            @include('ddad.campaigns._status', ['status' => $c->status])
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
            <div class="col-lg-4">
                <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                    <div class="st_card_head">
                        <div class="st_card_head_left">
                            <h2 class="st_card_title">Campaign progress</h2>
                        </div>
                    </div>
                    <div class="st_card_body performance-table clp st_padd_lr_25">
                        <div class="st_height_40 st_height_lg_30"></div>
                        <div class="st_campaign_progress">
                            <div class="st_campaign_progress_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M18 11v2h4v-2h-4zm-2 6.61c.96.71 2.21 1.65 3.2 2.39.4-.53.8-1.07 1.2-1.6-.99-.74-2.24-1.68-3.2-2.4-.4.54-.8 1.08-1.2 1.61zM20.4 5.6c-.4-.53-.8-1.07-1.2-1.6-.99.74-2.24 1.68-3.2 2.4.4.53.8 1.07 1.2 1.6.96-.72 2.21-1.65 3.2-2.4zM4 9c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2h1v4h2v-4h1l5 3V6L8 9H4zm11.5 3c0-1.33-.58-2.53-1.5-3.35v6.69c.92-.81 1.5-2.01 1.5-3.34z"/></svg>
                            </div>
                            <div class="st_table_progress st_style1">
                                <div class="progress st_blue_bg" style="width: 50%"></div>
                            </div>
                            <div class="st_progress_per">50%</div>
                        </div>
                        <div class="st_height_40 st_height_lg_30"></div>
                    </div>
                </div>
                <div class="st_height_30 st_height_lg_30"></div>
                <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                    <div class="st_card_head">
                        <div class="st_card_head_left">
                            <h2 class="st_card_title">Campaign progress</h2>
                        </div>
                    </div>
                    <div class="st_card_body performance-table clp st_padd_lr_25">
                        <div class="st_height_40 st_height_lg_30"></div>
                        <div class="row">
                            <div class="col-4">
                                <div class="st_sp_progress">
                                    <div class="st_sp_progress_subtitle">TIME (S)</div>
                                    <h3 class="st_sp_progress_title">110 <span>OF 900</span></h3>
                                    <div class="st_table_progress st_style1">
                                        <div class="progress st_gradient1" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="st_sp_progress">
                                    <div class="st_sp_progress_subtitle">FREQUENCY</div>
                                    <h3 class="st_sp_progress_title">110 <span>OF 900</span></h3>
                                    <div class="st_table_progress st_style1">
                                        <div class="progress st_gradient1" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="st_sp_progress">
                                    <div class="st_sp_progress_subtitle">COST CONSUMPTION</div>
                                    <h3 class="st_sp_progress_title">110 <span>OF 900</span></h3>
                                    <div class="st_table_progress st_style1">
                                        <div class="progress st_gradient1" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="st_cost_per_min">Cost Per Minute<span>100 BDT</span></div>
                        <div class="st_height_40 st_height_lg_30"></div>
                    </div>
                </div>

                <div class="st_height_15 st_height_lg_15"></div>
                <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                    <div class="st_card_head">
                        <div class="st_card_head_left">
                            <h2 class="st_card_title">Zone performance</h2>
                        </div>
                        <div class="st_card_head_right colps">
                            <a href="#" class="show-full-list">
                                <span class="material-icons">keyboard_arrow_down</span>
                            </a>
                        </div>
                    </div>
                    <div class="st_card_body performance-table clp">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Zones</th>
                                <th>Visits</th>
                                <th>Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($zonePerformances as $performance)
                                <tr>
                                    <td>{{ $performance['zone']->name }}</td>
                                    <td>{{ $performance['visits'] }}</td>
                                    <td>
                                        <div class="st_table_progress st_style1">
                                            <div class="progress st_blue_bg" style="width: {{ $performance['percentage'] }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="st_height_15 st_height_lg_15"></div>
                <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                    <div class="st_card_head">
                        <div class="st_card_head_left">
                            <h2 class="st_card_title">Location performance</h2>
                        </div>
                        <div class="st_card_head_right colps">
                            <a href="#" class="show-full-list">
                                <span class="material-icons">keyboard_arrow_down</span>
                            </a>
                        </div>
                    </div>
                    <div class="st_card_body performance-table clp">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Location</th>
                                <th>Visits</th>
                                <th>Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($locationPerformances as $performance)
                                <tr>
                                    <td>{{ $performance['location']->name }}</td>
                                    <td>{{ $performance['visits'] }}</td>
                                    <td>
                                        <div class="st_table_progress st_style1">
                                            <div class="progress st_blue_bg" style="width: {{ $performance['percentage'] }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="st_height_15 st_height_lg_15"></div>
                <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                    <div class="st_card_head">
                        <div class="st_card_head_left">
                            <h2 class="st_card_title">Shop Performance</h2>
                        </div>
                        <div class="st_card_head_right colps">
                            <a href="#" class="show-full-list">
                                <span class="material-icons">keyboard_arrow_down</span>
                            </a>
                        </div>
                    </div>
                    <div class="st_card_body performance-table clp">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Location</th>
                                <th>Visits</th>
                                <th>Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shopPerformances as $performance)
                                <tr>
                                    <td>{{ $performance['shop']->name }}</td>
                                    <td>{{ $performance['visits'] }}</td>
                                    <td>
                                        <div class="st_table_progress st_style1">
                                            <div class="progress st_blue_bg" style="width: {{ $performance['percentage'] }}%"></div>
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

        <div class="st_height_50 st_height_lg_50"></div>

@endsection

@push('header')
<style type="text/css">

</style>
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <script type="text/javascript">

        $.exists = function(selector) {
            return $(selector).length > 0;
        };
        // Color Variable
        // Focus Color
        var $indigo = "#5856D6";
        var $indigo1 = "rgba(88, 86, 214, 0.1)";
        var $blue = "#007AFF";
        var $green = "#34C759";
        var $orange = "#FF9500";
        var $pink = "#FF2D55";
        var $purple = "#AF52DE";
        var $red = "#FF3B30";
        var $teal = "#5AC8FA";
        var $yellow = "#FFCC00";
        var $gray = "#8E8E93";
           $gray = "#f3f3f3";
        // Base Color
        var $white = "#fff";
        var $black = "#000";
        var $black1 = "#24292e";
        var $black2 = "#666";
        var $black3 = "#a7a9ab";
        var $black4 = "#e1e4e8";
        var $black5 = "#f6f8fa";
        /* End Line chart Variable */

        var scalesYaxes = [{
            ticks: {
                fontSize: 14,
                fontColor: "rgba(0, 0, 0, 0.4)",
                padding: 15,
                beginAtZero: true,
                autoSkip: false,
                maxTicksLimit: 4
            },
            gridLines: {
                color: "rgba(0, 0, 0, 0.1)",
                zeroLineWidth: 2,
                zeroLineColor: "transparent",
                drawBorder: false,
                tickMarkLength: 0
            }
        }]
        var scalesXaxes = [{
            ticks: {
                fontSize: 14,
                fontColor: "rgba(0, 0, 0, 0.4)",
                padding: 5,
                beginAtZero: true,
                autoSkip: false,
                maxTicksLimit: 4
            },
            gridLines: {
                display: false
            }
        }];



    // Chart Style5_4
    if ($.exists(".st_gray_bg #st_chart5_4")) {
        var ctx1 = document.querySelector(".st_gray_bg #st_chart5_4").getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: "line",
            data: {
                labels: {!! json_encode($xaxix) !!},
                datasets: [{
                    label: "Audience",
                    data: {!! json_encode($yaxix) !!},
                    backgroundColor: "transparent",
                    borderColor: "#3EDAD8",
                    borderWidth: 3,
                    lineTension: 0,
                    pointBackgroundColor: $white,
                    pointDotRadius: 10
                }]
            },
            options: {
                title: {
                    display: false
                },
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: false,
                tooltips: {
                    displayColors: false,
                    mode: "nearest",
                    intersect: false,
                    position: "nearest",
                    xPadding: 8,
                    yPadding: 8,
                    caretPadding: 8,
                    backgroundColor: $white,
                    cornerRadius: 4,
                    titleFontSize: 13,
                    titleFontStyle: "normal",
                    bodyFontSize: 13,
                    titleFontColor: $black1,
                    bodyFontColor: $black2,
                    borderWidth: 1,
                    borderColor: $black4,
                    callbacks: {
                        // use label callback to return the desired label
                        label: function(tooltipItem, data) {
                            return tooltipItem.xLabel + ": " + tooltipItem.yLabel + "k";
                        },
                        // remove title
                        title: function(tooltipItem, data) {
                            return;
                        }
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: "rgba(0, 0, 0, 0.4)",
                            padding: 15,
                            beginAtZero: true,
                            autoSkip: false,
                            maxTicksLimit: 4
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, 0.1)",
                            zeroLineWidth: 1,
                            zeroLineColor: "rgba(0, 0, 0, 0.1)",
                            drawBorder: false,
                            tickMarkLength: 0
                        }
                    }],
                    xAxes: scalesXaxes
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 10,
                        bottom: 0
                    }
                }
            }
        });
    }

    // Chart Dark Style5_4
    if ($.exists(".st_dark_bg #st_chart5_4")) {
        var ctx1 = document.querySelector(".st_dark_bg #st_chart5_4").getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: "line",
            data: {
                labels: {!! json_encode($xaxix) !!},
                datasets: [{
                    label: "Audience",
                    data: {!! json_encode($yaxix) !!},
                    backgroundColor: "transparent",
                    borderColor: "#3EDAD8",
                    borderWidth: 3,
                    lineTension: 0,
                    pointBackgroundColor: $white,
                    pointDotRadius: 10
                }]
            },
            options: {
                title: {
                    display: false
                },
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: false,
                tooltips: {
                    displayColors: false,
                    mode: "nearest",
                    intersect: false,
                    position: "nearest",
                    xPadding: 8,
                    yPadding: 8,
                    caretPadding: 8,
                    backgroundColor: $white,
                    cornerRadius: 4,
                    titleFontSize: 13,
                    titleFontStyle: "normal",
                    bodyFontSize: 13,
                    titleFontColor: $black1,
                    bodyFontColor: $black2,
                    borderWidth: 1,
                    borderColor: $black4,
                    callbacks: {
                        // use label callback to return the desired label
                        label: function(tooltipItem, data) {
                            return tooltipItem.xLabel + ": " + tooltipItem.yLabel + "k";
                        },
                        // remove title
                        title: function(tooltipItem, data) {
                            return;
                        }
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: "rgba(255, 255, 255, 0.4)",
                            padding: 15,
                            beginAtZero: true,
                            autoSkip: false,
                            maxTicksLimit: 4
                        },
                        gridLines: {
                            color: "rgba(255, 255, 255, 0.1)",
                            zeroLineWidth: 1,
                            zeroLineColor: "rgba(255, 255, 255, 0.1)",
                            drawBorder: false,
                            tickMarkLength: 0
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: "rgba(255, 255, 255, 1)",
                            padding: 5,
                            beginAtZero: true,
                            autoSkip: false,
                            maxTicksLimit: 4
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 10,
                        bottom: 0
                    }
                }
            }
        });
    }





        // Chart Style3_1
        if ($.exists(".st_gray_bg #st_chart3_1")) {
            var ctx2 = document.querySelector(".st_gray_bg #st_chart3_1");
            var myChart2 = new Chart(ctx2, {
                type: "doughnut",
                data: {
                    datasets: [{
                        data: [{{ $perform }}, {{ 100  - $perform }}],
                        backgroundColor: ["#3EDAD8", $gray],
                        borderWidth: 0,
                    }],
                    labels: ["Performance", "NotPerform"]
                },
                options: {
                    cutoutPercentage: 75,
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        position: "top"
                    },
                    title: {
                        display: false,
                        text: "Technology"
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    tooltips: false
                }
            })
        }

        // Chart Style3_1
        if ($.exists(".st_dark_bg #st_chart3_1")) {
            var ctx2 = document.querySelector(".st_dark_bg #st_chart3_1");
            var myChart2 = new Chart(ctx2, {
                type: "doughnut",
                data: {
                    datasets: [{
                        data: [{{ $perform }}, {{ 100  - $perform }}],
                        backgroundColor: ["#3EDAD8", "#00AECA"],
                        borderWidth: 0,
                    }],
                    labels: ["Performance", "NotPerform"]
                },
                options: {
                    cutoutPercentage: 75,
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        position: "top"
                    },
                    title: {
                        display: false,
                        text: "Technology"
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    tooltips: false
                }
            })
        }

        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });

            $('.show-full-list').click(function (event) {
                event.preventDefault();
                $(this).toggleClass('active');

                $(this).closest('.st_card_head').siblings('.performance-table').toggleClass('clp')
            });

            $('.change-mode').click(function() {
                var todark = $(this).hasClass('change-to-dark');
                if(todark) {
                    $('body').addClass('st_dark_bg');
                    $('body').removeClass('st_gray_bg');
                    $('span', this).text('Light mode')
                } else {
                    $('body').addClass('st_gray_bg');
                    $('body').removeClass('st_dark_bg');
                    $('span', this).text('Dark mode')
                }
                $(this).toggleClass('change-to-dark')
            });
        });

    </script>
@endpush
