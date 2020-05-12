<!--  create model -->
<form id="androidBox-create-modal-form" action="{{ route('android-boxes.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="modal fade" id="androidBox-create-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-createLabel">New shop form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="st_level_up form-group">
                        <label for="imei">IMEI Number*</label>
                        <input type="text" name="imei" class="form-control @error('imei') is-invalid @enderror" id="imei" value="{{ old('imei') }}" required >
                        <div class="st_error_message"></div>
                    </div>

                    <div class="st_level_up form-group">
                        <label for="label">Label *</label>
                        <input type="text" name="label" class="form-control @error('label') is-invalid @enderror" id="label" value="{{ old('label') }}" required >
                        <div class="st_error_message"></div>
                    </div>

                    <div class="row">
                        <label class="col-3 col-form-label pl-3">Status:</label>
                        <div class="col-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="active" type="radio" name="status" value="active" class="custom-control-input">
                                <label class="custom-control-label" for="active">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="inactive" type="radio" name="status" value="inactive" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="inactive">Inactive</label>
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
        //show modal without form submit
        $('#androidBox-modal-trigger').on('click', function (event) {
            event.preventDefault();
            $('#androidBox-create-modal').modal('show');
        });
    </script>

    <script type="text/javascript">
        // this is the id of the form
        $("#androidBox-create-modal-form").submit(function(e) {

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
                            $('#androidBox-create-modal-form').trigger('reset')
                            $('#androidBox-create-modal').modal('hide');
                        @elseif($after_success == 'add_to_list')
                            $('#androidBox-create-modal-form').trigger('reset')
                            $('#androidBox-create-modal').modal('hide');
                            var newOption = new Option(response.androidBox.label, response.androidBox.id, false, true);
                            $('[name="android_box_id"]').append(newOption).selectpicker('refresh');
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



