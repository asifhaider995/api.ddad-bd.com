<!--  create model -->
<form id="zones-create-modal-form" action="{{ route('zones.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="modal fade" id="zones-create-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-createLabel">New zone form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="st_level_up  form-group ">
                                <label>Name</label>
                                <input name="name" required type="text" class="form-control" >
                                <div class="st_error_message"></div>
                            </div>
                            <div class="st_level_up form-group">
                                <label>Locations</label>
                                <textarea class="form-control" name="description" rows="5" style="height: 92px;"></textarea>
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
        $("#zones-create-modal-form").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);

            $("[name]", form).removeClass("st_error")
                .siblings(".st_error_message").text('');

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(), // serializes the form's elements.
                success: function(response)  {
                    toastr.success(response.message);
                    setTimeout(function() {
                        @if($after_success == 'close_modal')
                            $('#zones-create-modal-form').trigger('reset')
                            $('#zones-create-modal').modal('hide');
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
