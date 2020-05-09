<!--  create model -->
<form id="shops-create-modal-form" action="{{ route('shops.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="modal fade" id="shops-create-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-createLabel">New shop form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="st_level_up form-group">
                                        <label for="name">Shop Name *</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required >
                                        <div class="st_error_message"></div>
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="owner_name">Owner's Name *</label>
                                        <input type="text" name="owner_name" class="form-control @error('owner_name') is-invalid @enderror" id="owner_name" value="{{ old('owner_name') }}" required >
                                        <div class="st_error_message"></div>
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="kcp_name">KCP Name *</label>
                                        <input type="text" name="kcp_name" class="form-control @error('kcp_name') is-invalid @enderror" id="kcp_name" value="{{ old('kcp_name') }}" required >
                                        <div class="st_error_message"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="st_level_up form-group">
                                        <label>Payment Per Ad *</label>
                                        <input name="payment_per_ad" type="number" min="0" value="{{ old('payment_per_ad', 0) }}" class="form-control">
                                        <div class="st_error_message"></div>
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="owner_nid">Owner's NID *</label>
                                        <input type="text" name="owner_nid" class="form-control @error('owner_nid') is-invalid @enderror" id="owner_nid" value="{{ old('owner_nid') }}" required >
                                        <div class="st_error_message"></div>
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="kcp_mobile_number">KCP Mobile *</label>
                                        <input type="text" name="kcp_mobile_number" class="form-control @error('kcp_mobile_number') is-invalid @enderror" id="kcp_mobile_number" value="{{ old('kcp_mobile_number') }}" required >
                                        <div class="st_error_message"></div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="st_level_up form-group">
                                    <label for="address">Shop Address</label>
                                    <textarea name="address" class=" form-control @error('address') is-invalid @enderror" style="height: 92px;" rows="5" id="address" required>{{ old('address') }}</textarea>
                                    <div class="st_error_message"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="form-label" for="isp_id">ISP</label>
                                    <select class="st_selectpicker2 mb-3" name="isp_id" id="isp_id" data-size="7" required>
                                        @foreach($isps as $isp)
                                            <option value="{{ $isp->id }}" @if(old('isp_id') == $isp->id) selected @endif>{{ $isp->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="st_error_message"></div>
                                </div>

                                <div class="col-lg-2">
                                    <label class="form-label" for="shop_type">Zone</label>
                                    <select class="st_selectpicker1" name="zone_id" id="zone_id" data-size="7" required>
                                        @foreach($zones as $zone)
                                            <option value="{{ $zone->id }}" @if(old('zone_id') == $zone->id) selected @endif>{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="st_error_message"></div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="default-06">Document</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" multiple="" name="document" class="custom-file-input  @error('name') is-invalid @enderror" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <div class="st_error_message"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-sm-1 st_npcsf"></div>

                        <div class="col-lg-3">
                            <div class="col">
                                <label class="form-label" for="tv_id">TV</label>
                                <select class="st_selectpicker1 mb-3" name="tv_id" id="tv_id" data-size="7" required>
                                    @foreach($tvs as $tv)
                                        <option value="{{ $tv->id }}" @if(old('tv_id') == $tv->id) selected @endif>{{ $tv->serial_number }}</option>
                                    @endforeach
                                </select>
                                <div class="st_error_message"></div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="detector_id">Detector</label>
                                <select class="st_selectpicker2 mb-3" name="detector_id" id="detector_id" data-size="7" required>
                                    @foreach($detectors as $detector)
                                        <option value="{{ $detector->id }}" @if(old('detector_id') == $detector->id) selected @endif>{{ $detector->unique_id }}</option>
                                    @endforeach
                                </select>
                                <div class="st_error_message"></div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="android_box_id">Android Box</label>
                                <select class="st_selectpicker1 mb-3" name="android_box_id" id="android_box_id" data-size="7" required>
                                    @foreach($android_boxs as $android_box)
                                        <option value="{{ $android_box->id }}" @if(old('android_box_id') == $android_box->id) selected @endif>{{ $android_box->label }}</option>
                                    @endforeach
                                </select>
                                <div class="st_error_message"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div><!-- /.modal-content -->


        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>


@push('script')
    <script type="text/javascript">
        // this is the id of the form
        $("#shops-create-modal-form").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);

            $("[name]", form).removeClass("st_error")
                .siblings(".st_error_message").text('');

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: new FormData(this), // serializes the form's elements.
                cache: false,
                contentType: false,
                processData: false,
                success: function(response)  {
                    toastr.success(response.message);
                    setTimeout(function() {
                        @if($after_success == 'close_modal')
                            $('#shops-create-modal-form').trigger('reset')
                            $('#shops-create-modal').modal('hide');
                        @elseif($after_success == 'reload_page')
                            location.reload(true);
                        @endif
                    }, 1000)
                },
                error: function (reject) {
                    if( reject.status === 422 ) {
                        var responseTxt = $.parseJSON(reject.responseText);
                        toastr.error(responseTxt.message);
                        $.each(responseTxt.errors, function (key, val) {
                            $("[name=" + key + "]", form)
                                .addClass("st_error")
                                .siblings(".st_error_message").text(val[0]);
                        });
                    } else {
                        alert('Something wrong')
                    }
                }
            });

        });
    </script>
@endpush



