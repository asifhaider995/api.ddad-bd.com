@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Shop: {{ $shop->name }}</h2>
                    </div>

                    <div class="st_card_head_right">
                        <a href="{{ route('shops.edit', $shop) }}" class="btn btn-primary btn-sm">
                            <i class="material-icons">create</i>Edit
                        </a>
                    </div>
                </div>
                <div class="st_card_body">
                        <div class="st_card_padd_25">
                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="st_height_25 st_height_lg_25"></div>
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label for="name">Shop Name *</label>
                                                <input type="text" name="name" class="form-control" value="{{  $shop->name}}"  >
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="owner_name">Owner's Name *</label>
                                                <input type="text" name="owner_name" class="form-control" value="{{  $shop->owner_name }}"  >
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="kcp_name">KCP Name *</label>
                                                <input type="text" name="kcp_name" class="form-control" value="{{  $shop->kcp_name }}"  >
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label>Payment Per Ad *</label>
                                                <input type="text" name="payment_per_ad" class="form-control" value="{{  $shop->payment_per_ad }}"  >
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="owner_nid">Owner's NID *</label>
                                                <input type="text" name="owner_nid" class="form-control" value="{{  $shop->owner_nid }}"  >
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="kcp_mobile_number">KCP Mobile *</label>
                                                <input type="text" name="kcp_mobile" class="form-control" value="{{  $shop->kcp_mobile_number }}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="st_level_up form-group">
                                            <label for="address">Shop Address</label>
                                            <textarea type="text" name="shop_address" class="form-control">{{  $shop->address }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="form-label" for="isp_id">ISP</label>
                                            <input type="text" name="isp_name" class="form-control" value="{{  $shop->isp->name ?? '-' }}"  >
                                        </div>

                                        <div class="col-lg-4">
                                            <label class="form-label" for="location_id">Location</label>
                                            <input type="text" name="location" class="form-control" value="{{  $shop->location->name ?? '-' }}"  >
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Document(NID/TradeLicence)</label>
                                                <a href="{{ $shop->document_src }}" target="_blank">
                                                    <img src="{{  $shop->document_src }}" style="max-width: 100%">
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="st_height_25 st_height_lg_25"></div>
                                </div>

                                <div class="col-sm-1 st_npcsf"></div>
                                @php($device = $shop->device ?: new \App\Models\Ddad\Device())

                                <div class="col-lg-3">
                                    <div class="st_height_20 st_height_lg_20"></div>

                                    <div class="st_level_up form-group">
                                        <label for="name">Android label*</label>
                                        <input type="text" name="android_label" class="form-control" value="{{  $device->name ?? '-' }}"  >
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="android_imei">Android IMEI*</label>
                                        <input type="text" name="android_imei" class="form-control" value="{{  $device->android_imei ?? '-' }}"  >
                                    </div>

                                    <div class="st_level_up form-group">
                                        <label for="name">Detector label*</label>
                                        <input type="text" name="detector_label" class="form-control" value="{{  $device->detector_label ?? '-' }}"  >
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="owner_name">Detector serial*</label>
                                        <input type="text" name="detector_serial" class="form-control" value="{{  $device->detector_serial ?? '-' }}"  >
                                    </div>


                                    <div class="st_level_up form-group">
                                        <label for="name">TV label*</label>
                                        <input type="text" name="tv_label" class="form-control" value="{{  $device->tv_label ?? '-' }}"  >
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="owner_name">TV serial*</label>
                                        <input type="text" name="tv_serial" class="form-control" value="{{  $device->tv_serial ?? '-' }}"  >
                                    </div>

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
