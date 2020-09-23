<!--  create model -->
<form id="devices-create-modal-form show" action="{{ route('devices.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="modal fade" id="devices-create-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel"


         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-createLabel">Devices form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="st_level_up form-group">
                                <label for="android_label">Android label*</label>
                                <input type="text" name="android_label" class="form-control @error('android_label') is-invalid @enderror"
                                       id="android_label" value="{{ old('android_label') }}">
                                @error('android_label')
                                    <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="st_level_up form-group">
                                <label for="android_imei">Android IMEI*</label>
                                <input type="text" name="android_imei"
                                       class="form-control @error('android_imei') is-invalid @enderror" id="android_imei"
                                       value="{{ old('android_imei') }}" >
                                @error('android_imei')
                                    <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="st_level_up form-group">
                                <label for="detector_label">Detector label*</label>
                                <input type="text" name="detector_label" class="form-control @error('detector_label') is-invalid @enderror"
                                       id="detector_label" value="{{ old('detector_label') }}" >
                                @error('detector_label')
                                    <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="st_level_up form-group">
                                <label for="detector_serial">Detector serial*</label>
                                <input type="text" name="detector_serial"
                                       class="form-control @error('detector_serial') is-invalid @enderror" id="detector_serial"
                                       value="{{ old('detector_serial') }}" >
                                @error('detector_serial')
                                <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="st_level_up form-group">
                                <label for="tv_label">TV label*</label>
                                <input type="text" name="tv_label" class="form-control @error('tv_label') is-invalid @enderror"
                                       id="tv_label" value="{{ old('tv_label') }}" >
                                @error('tv_label')
                                <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="st_level_up form-group">
                                <label for="tv_serial">TV serial*</label>
                                <input type="text" name="tv_serial"
                                       class="form-control @error('tv_serial') is-invalid @enderror" id="tv_serial"
                                       value="{{ old('tv_serial') }}" >
                                @error('tv_serial')
                                <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save device</button>



                </div>
            </div>
        </div>
    </div>
</form>

@push('script')
<script>
var  error = false;
@error('android_label') error = true; @enderror
@error('detector_label')  error = true; @enderror
@error('tv_label') error = true; @enderror
@error('android_imei') error = true; @enderror
@error('tv_serial') error = true; @enderror
@error('detector_serial') error = true; @enderror
if(error) {

    $('#devices-create-modal').modal('show')
}
</script>
@endpush
