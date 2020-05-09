<!--  create model -->
<form id="tv-create-modal-form" action="{{ route('tvs.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="modal fade" id="tv-create-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-createLabel">New tv form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="st_level_up form-group">
                        <label for="serial_number">TV Serial Number *</label>
                        <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" id="serial_number" value="{{ old('serial_number') }}" required >
                        <div class="st_error_message"></div>
                    </div>

                    <div class="st_level_up form-group">
                        <label for="size">Size *</label>
                        <input type="text" name="size" class="form-control @error('size') is-invalid @enderror" id="size" value="{{ old('size') }}" required >
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
        // this is the id of the form
        $("#tv-create-modal-form").submit(function(e) {

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
                            $('#tv-create-modal-form').trigger('reset')
                            $('#tv-create-modal').modal('hide');
                        @elseif($after_success == 'add_to_list')
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



