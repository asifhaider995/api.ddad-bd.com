@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Edit shop</h2>
                    </div>
                </div>
                <div class="st_card_body">
                    <form action="{{ route('shops.update', $shop) }}" id="edit-form" method="post"
                          enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="st_card_padd_25">
                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="st_height_25 st_height_lg_25"></div>
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label for="name">Shop Name *</label>
                                                <input type="text" name="name"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       id="name" value="{{ old('name', $shop->name) }}" required>
                                                @error('name')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="owner_name">Owner's Name *</label>
                                                <input type="text" name="owner_name"
                                                       class="form-control @error('owner_name') is-invalid @enderror"
                                                       id="owner_name"
                                                       value="{{ old('owner_name', $shop->owner_name) }}" required>
                                                @error('owner_name')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="kcp_name">KCP Name *</label>
                                                <input type="text" name="kcp_name"
                                                       class="form-control @error('kcp_name') is-invalid @enderror"
                                                       id="kcp_name" value="{{ old('kcp_name', $shop->kcp_name) }}"
                                                       required>
                                                @error('kcp_name')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label>Payment Per Ad *</label>
                                                <input name="payment_per_ad" type="number" min="0"
                                                       value="{{ old('payment_per_ad', $shop->payment_per_ad ?: 0) }}"
                                                       class="form-control">
                                                @error('payment_per_ad')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="owner_nid">Owner's NID *</label>
                                                <input type="text" name="owner_nid"
                                                       class="form-control @error('owner_nid') is-invalid @enderror"
                                                       id="owner_nid" value="{{ old('owner_nid', $shop->owner_nid) }}"
                                                       required>
                                                @error('owner_nid')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="kcp_mobile_number">KCP Mobile *</label>
                                                <input type="text" name="kcp_mobile_number" pattern="[0-9,]{11,22}"
                                                       class="form-control @error('kcp_mobile_number') is-invalid @enderror"
                                                       id="kcp_mobile_number"
                                                       value="{{ old('kcp_mobile_number', $shop->kcp_mobile_number) }}"
                                                       required>
                                                @error('kcp_mobile_number')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="st_level_up form-group">
                                            <label for="address">Shop Address</label>
                                            <textarea name="address"
                                                      class=" form-control @error('address') is-invalid @enderror"
                                                      style="height: 92px;" rows="5" id="address"
                                                      required>{{ old('address', $shop->address) }}</textarea>
                                            @error('address')
                                            <div class="st_error_message">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="form-label" for="isp_id">ISP</label>
                                            <select class="st_selectpicker2 mb-3" name="isp_id" id="isp_id"
                                                    data-size="7" required>
                                                @foreach($isps as $isp)
                                                    <option value="{{ $isp->id }}"
                                                            @if(old('isp_id', $shop->isp_id) == $isp->id) selected @endif>{{ $isp->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('isp_id')
                                            <div class="st_error_message">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label" for="location_id">Location</label>
                                            <select class="st_selectpicker2 mb-3" name="location_id" id="location_id"
                                                    data-size="7" required>
                                                @foreach($locations as $location)
                                                    <option value="{{ $location->id }}"
                                                            @if(old('location_id', $shop->location_id) == $location->id) selected @endif>{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('location_id')
                                            <div class="st_error_message">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Document(NID front
                                                    page)</label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" name="nid"
                                                               class="custom-file-input  @error('name') is-invalid @enderror"
                                                               id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        <div class="st_error_message"></div>
                                                    </div>
                                                </div>


                                                @error('nid')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror

                                                @if( $shop->nid_path)
                                                    <a target="_blank" href="{{ $shop->nid_src }}">
                                                        <img src="{{  $shop->nid_src }}" style="max-width: 100%">
                                                    </a>
                                                @else
                                                    Empty
                                                @endif


                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Document(Trade
                                                    Licence)</label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" name="licence"
                                                               class="custom-file-input  @error('licence') is-invalid @enderror"
                                                               id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        <div class="st_error_message"></div>
                                                    </div>
                                                </div>

                                                @error('licence')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror

                                                @if( $shop->licence_path)
                                                    <a target="_blank" href="{{ $shop->licence_path }}">
                                                        <img src="{{  $shop->licence_src }}" style="max-width: 100%">
                                                    </a>
                                                @else
                                                    Empty
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="st_height_25 st_height_lg_25"></div>
                                </div>

                                <div class="col-sm-1 st_npcsf"></div>
                                @php($device = $shop->device ?: new \App\Models\Ddad\Device())

                                <div class="col-lg-3">
                                    <div class="st_height_10 st_height_lg_10"></div>
                                    <a data-toggle="modal" data-target="#unallocated-devices-modal"
                                       @if($device->id) style="display: none"
                                       @endif class="btn btn-info add-unallocated" href="#"><span
                                            class="material-icons">add</span>Add unallocated device</a>
                                    <a @if(!$device->id) style="display: none"
                                       @endif class="btn btn-danger remove-allocated" href="#"><span
                                            class="material-icons">delete</span>Remove allocated device</a>
                                    <input type="hidden" name="device_id" value="{{ $device->id }}">
                                    <div class="st_height_15 st_height_lg_15"></div>
                                    <div class="hide-edit-box"></div>
                                    <div class="st_level_up form-group">
                                        <label for="name">Android label*</label>
                                        <input type="text" name="android_label"
                                               class="form-control @error('android_label') is-invalid @enderror"
                                               id="name" value="{{ old('android_label', $device->android_label) }}">
                                        @error('android_label')
                                        <div class="st_error_message">{{ $message }}</div>
                                        @endif
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="owner_name">Android IMEI*</label>
                                        <input type="text" name="android_imei"
                                               class="form-control @error('android_imei') is-invalid @enderror"
                                               id="android_imei"
                                               value="{{ old('android_imei', $device->android_imei) }}">
                                        @error('android_label')
                                        <div class="st_error_message">{{ $message }}</div>
                                        @endif
                                    </div>

                                    <div class="st_level_up form-group">
                                        <label for="name">Detector label*</label>
                                        <input type="text" name="detector_label"
                                               class="form-control @error('detector_label') is-invalid @enderror"
                                               id="name" value="{{ old('detector_label', $device->detector_label) }}">
                                        <div class="st_error_message"></div>
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="owner_name">Detector serial*</label>
                                        <input type="text" name="detector_serial"
                                               class="form-control @error('detector_serial') is-invalid @enderror"
                                               id="detector_serial"
                                               value="{{ old('detector_serial', $device->detector_serial) }}">
                                        <div class="st_error_message"></div>
                                    </div>


                                    <div class="st_level_up form-group">
                                        <label for="name">TV label*</label>
                                        <input type="text" name="tv_label"
                                               class="form-control @error('tv_label') is-invalid @enderror"
                                               id="tv_label" value="{{ old('tv_label', $device->tv_label) }}">
                                        <div class="st_error_message"></div>
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="owner_name">TV serial*</label>
                                        <input type="text" name="tv_serial"
                                               class="form-control @error('tv_serial') is-invalid @enderror"
                                               id="tv_serial"
                                               value="{{ old('tv_serial', $device->tv_serial) }}">
                                        <div class="st_error_message"></div>
                                    </div>

                                </div>
                            </div>

                            <hr>
                            <div class="st_height_25 st_height_lg_25"></div>

                            <div class="st_form_btns st_style1 text-right">
                                <a href="{{ route('shops.index') }}" class="btn btn-outline-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <div class="st_height_25 st_height_lg_25"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="st_height_25 st_height_lg_25"></div>
    @include('ddad.shops.unallocated-devices')
@endsection


@push('script')
    <script type="text/javascript">
        $('.remove-allocated').click(function () {
            $('.remove-allocated').hide();
            $('[name=device_id]').val(null);
            $('.add-unallocated').show();

            $('[name="android_imei"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="android_label"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="tv_label"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="tv_serial"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="detector_label"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="detector_serial"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
        })
    </script>
@endpush
