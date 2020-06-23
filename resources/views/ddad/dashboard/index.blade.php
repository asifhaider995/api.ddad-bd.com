@extends('ddad.layout')
@section('content')
    <div class="st_height_20 st_height_lg_20"></div>
    <div class="st_page_header st_style1">
        <div class="st_page_header_left">
            <h1 class="st_page_header_title">Today's overview</h1>
            <p class="st_page_header_subtitle">Welcome to Dashboard Template.</p>
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
            Availability chart(Hourly)
        </div>
        <style type="text/css">
            .ability {
                width: 100px;
                float: left;
                padding: 13px;
                border: 1px solid;
                background-color: #f0fff0;
                color: #000;
                text-align: center;
            }
        </style>
        <div class="card-body">
            @for($i = -5; $i < 150; $i++)
                @php
                    $max = 60 * 60;
                    $sec = rand(0, $max);
                @endphp

                <div class="ability" style="background-color: {{ redYellowGreen($sec, $max) }}">
                    <div class="date">{{ formateDate(now()->addDays($i)) }}</div>
                    <div class="available">{{ $sec }} sec</div>
                </div>
            @endfor
        </div>

    </div>

@endsection
