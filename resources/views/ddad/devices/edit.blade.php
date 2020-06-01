@extends('ddad.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Edit device:</h2>
                    </div>
                    <div class="st_card_head_right">
                        <button data-toggle="modal" data-target="#devices-create-modal" class="btn btn-primary btn-sm">
                            <i class="material-icons">exit_to_app</i>Back
                        </button>
                    </div>
                </div>
                <div class="st_card_body" style="padding: 20px;">
                    <form action="{{ route('devices.update', $device) }}" method="post" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="st_level_up form-group">
                                    <label for="android_label">Android label*</label>
                                    <input type="text" name="android_label" class="form-control @error('android_label') is-invalid @enderror"
                                           id="android_label" value="{{ old('android_label', $device->android_label) }}">
                                    @error('android_label')
                                        <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="st_level_up form-group">
                                    <label for="android_imei">Android IMEI*</label>
                                    <input type="text" name="android_imei"
                                           class="form-control @error('android_imei') is-invalid @enderror" id="android_imei"
                                           value="{{ old('android_imei', $device->android_imei) }}" >
                                    @error('android_imei')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="st_level_up form-group">
                                    <label for="detector_label">Detector label*</label>
                                    <input type="text" name="detector_label" class="form-control @error('detector_label') is-invalid @enderror"
                                           id="detector_label" value="{{ old('detector_label', $device->detector_label) }}" >
                                    @error('detector_label')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="st_level_up form-group">
                                    <label for="detector_serial">Detector serial*</label>
                                    <input type="text" name="detector_serial"
                                           class="form-control @error('detector_serial') is-invalid @enderror" id="detector_serial"
                                           value="{{ old('detector_serial', $device->detector_serial) }}" >
                                    @error('detector_serial')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="st_level_up form-group">
                                    <label for="tv_label">TV label*</label>
                                    <input type="text" name="tv_label" class="form-control @error('tv_label') is-invalid @enderror"
                                           id="tv_label" value="{{ old('tv_label', $device->tv_label) }}" >
                                    @error('tv_label')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="st_level_up form-group">
                                    <label for="tv_serial">TV serial*</label>
                                    <input type="text" name="tv_serial"
                                           class="form-control @error('tv_serial') is-invalid @enderror" id="tv_serial"
                                           value="{{ old('tv_serial', $device->tv_serial) }}" >
                                    @error('tv_serial')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save device</button>


                    </form>
                </div>
            </div>

        </div>
    </div>


    <div class="st_height_15 st_height_lg_15"></div>

@endsection

