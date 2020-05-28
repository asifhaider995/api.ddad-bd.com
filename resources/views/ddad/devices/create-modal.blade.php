<!--  create model -->
<form id="devices-create-modal-form" action="{{ route('detectors.store') }}" method="post" autocomplete="off">
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
                                <label for="name">Android label*</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       id="name" value="{{ old('name') }}" required>
                                <div class="st_error_message"></div>
                            </div>
                            <div class="st_level_up form-group">
                                <label for="owner_name">Android IMEI*</label>
                                <input type="text" name="owner_name"
                                       class="form-control @error('owner_name') is-invalid @enderror" id="owner_name"
                                       value="{{ old('owner_name') }}" required>
                                <div class="st_error_message"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="st_level_up form-group">
                                <label for="name">Detector label*</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       id="name" value="{{ old('name') }}" required>
                                <div class="st_error_message"></div>
                            </div>
                            <div class="st_level_up form-group">
                                <label for="owner_name">Serial IMEI*</label>
                                <input type="text" name="owner_name"
                                       class="form-control @error('owner_name') is-invalid @enderror" id="owner_name"
                                       value="{{ old('owner_name') }}" required>
                                <div class="st_error_message"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="st_level_up form-group">
                                <label for="name">TV label*</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       id="name" value="{{ old('name') }}" required>
                                <div class="st_error_message"></div>
                            </div>
                            <div class="st_level_up form-group">
                                <label for="owner_name">TV serial*</label>
                                <input type="text" name="owner_name"
                                       class="form-control @error('owner_name') is-invalid @enderror" id="owner_name"
                                       value="{{ old('owner_name') }}" required>
                                <div class="st_error_message"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save device</button>



                </div>
            </div>
        </div>
    </div>
</form>
