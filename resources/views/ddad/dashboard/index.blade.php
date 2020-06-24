@extends('ddad.layout')
@section('content')
    <div class="st_height_20 st_height_lg_20"></div>
    <div class="st_page_header st_style1">
        <div class="st_page_header_left">
            <h1 class="st_page_header_title">Today's overview</h1>
        </div>
        <div class="st_page_header_right">
            <a href="{{ route('dashboard.playlist') }}" class="btn btn-primary">
                View playlist
            </a>
        </div>
    </div>
    <div class="st_height_15 st_height_lg_15"></div>
    <div class="card mt-3 mb-3">

        <div class="card-header">
            Price, Placement and available slot chart
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Package Name</td>
                    <td>Placement Name</td>
                    <td>Duration Seconds</td>
                    <td>Daily Minutes</td>
                    <td>Price TV/Month</td>
                    <td>Daily Frequency</td>
                    <td>Hourly Frequency</td>
                    <td>Slot duration(sec)</td>
                </tr>
                @php
                    $packages = \App\Package::all();
                    $placements = \App\Placement::all();
                    $ert = setting_get('estimated_run_time');
                @endphp
                @foreach($packages as $package)
                    @foreach($placements as $placement)
                        <tr>
                            <td>{{ $package->name }}</td>
                            <td>{{ $placement->name }}</td>
                            <td>{{ $placement->duration }}</td>
                            <td>{{ $package->duration }}</td>
                            <td>{{ formatCurrency($package->rate) }}</td>
                            <td>{{ floor($dailyFrequency = $package->duration * 60 / $placement->duration) }}</td>
                            <td>{{ floor($hourlyFrequency = $dailyFrequency * 60 /$ert) }}</td>
                            <td>{{ $hourlyFrequency * $placement->duration }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>

    </div>
    <div class="card mt-3 mb-3">

        <div class="card-header">
            Today's campaigns
        </div>
        <div class="card-body">
            <table class="table table-bordered">

                <tr>
                    <th rowspan="2">Title</th>
                    <th rowspan="2">Placement</th>
                    <th rowspan="2">Package</th>
                    <th rowspan="2">Queue</th>
                    <th rowspan="2">Slot Duration</th>
                    <th rowspan="2">Daily Frequency</th>
                    <th class="text-center" colspan="2">Hourly Frequency</th>
                </tr>
                <tr>
                    <th class="text-center">Purchased</th>
                    <th class="text-center">Getting</th>
                </tr>
                @foreach($campaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->title }}</td>
                        <td>{{ $campaign->placement }}</td>
                        <td>{{ $campaign->package }}</td>
                        <td class="text-center">{{ $campaign->primary_queue }}</td>
                        <td class="text-center">{{ $campaign->slotTime }}</td>
                        <td class="text-center">{{ $campaign->dailyFrequency }}</td>
                        <td class="text-center">{{ $campaign->hourlyFrequency }}</td>
                        @php($x = $campaign->calculateActualHourlyFrequency())
                        <td class="text-center @if($x < $campaign->hourlyFrequency) bg-danger text-white @endif">{{ $x }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="card mt-3 mb-3">

        <div class="card-header">
            Availability chart(Hourly)
        </div>
        <style type="text/css">
            .ability {
                width: 100px;
                height: 100px;
                float: left;
                padding: 13px;
                border: 1px solid;
                background-color: #f0fff0;
                color: #000;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                position: relative;
            }
            .ability.today:before {
                display: block;
                content: "TODAY";
                width: 92px;
                background-color: pink;
                border-radius: 10px;
                color: #000;
                position: absolute;
                top: 3px;
            }
        </style>
        <div class="card-body">
            @php($today = formateDate(now()))
            @foreach($availability->getDates() as $date => $slotCover)
                <div class="ability @if($today == $date) today @endif" style="background-color: {{ redYellowGreen(3600 - $slotCover, 3600) }}">
{{--                    @if($today == $date) <div class="today">Today</div> @endif--}}
                    <div class="date">{{ $date }}</div>
                    <div class="available">{{ 3600 - $slotCover }} sec</div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
