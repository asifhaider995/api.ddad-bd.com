@extends('ddad.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Devices</h2>
                    </div>
                    <div class="st_card_head_right">
                        <button data-toggle="modal" data-target="#devices-create-modal" class="btn btn-primary btn-sm">
                            <i class="material-icons">add</i>Create New
                        </button>
                    </div>
                </div>
                <div class="st_card_body">
                    <div class="st_data_table_wrap st_fixed_height1">
                        <div class="st_data_table_btn_group">
                            <div class="st_data_table_btn">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio"  name="filter_by" @if(!in_array(request('filter_by'), ['allocated', 'unallocated', 'error'])) checked @endif class="custom-control-input" value="all">
                                    <label class="custom-control-label">All</label>
                                </div>
                            </div>

                            <div class="st_data_table_btn">
                                <div class="custom-control custom-radio custom-control-inline text-success">
                                    <input type="radio"  name="filter_by" @if(in_array(request('filter_by'), ['unallocated'])) checked @endif class="custom-control-input" value="unallocated">
                                    <label class="custom-control-label">Unallocated</label>
                                </div>
                            </div>
                            <div class="st_data_table_btn">
                                <div class="custom-control custom-radio custom-control-inline text-info">
                                    <input type="radio"  name="filter_by" @if(in_array(request('filter_by'), ['allocated'])) checked @endif  class="custom-control-input" value="allocated">
                                    <label class="custom-control-label">Allocated</label>
                                </div>
                            </div>
                            <div class="st_data_table_btn">
                                <div class="custom-control custom-radio custom-control-inline text-danger">
                                    <input type="radio" name="filter_by" @if(in_array(request('filter_by'), ['error'])) checked @endif  class="custom-control-input" value="error">
                                    <label class="custom-control-label" >Error</label>
                                </div>
                            </div>

                        </div>
                        <table id="st_dataTable" class="display">
                            <thead>
                            <tr>
                                <th>ANDROID</th>
                                <th>TV</th>
                                <th>DETECTOR</th>
                                <th>LOCATION</th>
                                <th>SHOP</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($devices as $device)
                                <tr>
                                    <td>
                                        @if($device->android_label)
                                            @if($device->androidAlerts())
                                                <span class="text-danger material-icons">warning</span>
                                            @else
                                                <span class="text-success material-icons">check</span>
                                            @endif
                                            {{ $device->android_label }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>

                                        @if($device->tv_label)
                                            @if($device->tvAlerts())
                                                <span class="text-danger material-icons">warning</span>
                                            @else
                                                <span class="text-success material-icons">check</span>
                                            @endif
                                            {{ $device->tv_label }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($device->detector_label)
                                            @if($device->detectorAlerts())
                                                <span class="text-danger material-icons">warning</span>
                                            @else
                                                <span class="text-success material-icons">check</span>
                                            @endif
                                            {{ $device->detector_label }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $device->shop->location->name ?? '-' }}</td>
                                    <td>{{ $device->shop->name ?? '-' }}</td>
                                    <td>
                                        <div class="st_table_action_btn_wrap">
                                            <button class="st_table_action_btn dropdown-toggle" data-toggle="dropdown">
                                                <i class="material-icons">more_horiz</i></button>
                                            <div
                                                class="dropdown-menu dropdown-size-sm dropdown-menu-right st_boxshadow">
                                                <a class="dropdown-item" href="{{ route('devices.edit', $device) }}"><i class="material-icons-outlined">create</i>Edit</a>
                                                <a class="dropdown-item" href="#" onclick="" data-delete_action="{{ route('devices.delete', $device) }}"><i
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
    </div>


    <div class="st_height_15 st_height_lg_15"></div>

    @include('ddad.devices.create-modal', ['after_success' => 'close_modal'])
@endsection


@push('script')
    <script type="text/javascript">
        $('[name=filter_by]').click(function () {
            window.location.href = "{{ route('devices.index') }}?filter_by=" + $(this).val();
        })
    </script>
@endpush
