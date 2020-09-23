@extends('ddad.layout')
@section('content')
    <div class="st_height_20 st_height_lg_20"></div>
    <div class="st_page_header st_style1">
        <div class="st_page_header_left">
            <h1 class="st_page_header_title">Today's playlist</h1>
        </div>
        <div class="st_page_header_right">
            <a href="{{ route('dashboard.index') }}" class="btn btn-primary">
                Back
            </a>
        </div>
    </div>
    <div class="st_height_15 st_height_lg_15"></div>
    <div class="card mt-3 mb-3">

        <div class="card-header">
            Playlist(Hourly)
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Campaign</td>
                    <td>P.Content</td>
                    <td>S.Content</td>
                    <td>Duration(Sec)</td>
                    <td>Cumulative(Sec)</td>
                </tr>
                @php($c = 0)
                @foreach($playlist->playlist() as $play)
                    <tr>
                        <td><a href="{{ route('campaigns.show', $play['campaign_id']) }}">{{ $play['campaign_title'] }}</a></td>
                        <td><a target="_blank" href="{{ $play['primary_src'] }}">View</a></td>
                        @if($play['secondary_src'])
                        <td><a target="_blank" href="{{ $play['secondary_src'] }}">View</a></td>
                        @else
                            <td>-</td>
                            @endif
                        <td>{{ $play['duration'] }}</td>
                        <td>{{ $c += $play['duration'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection
