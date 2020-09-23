<!--  create model -->
<form id="zones-create-modal-form" action="{{ route('zones.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="modal fade" id="zones-create-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-createLabel">New zone form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="st_level_up  form-group">
                        <label>Zone name</label>
                        <input name="name" required type="text" class="form-control" >
                        <div class="st_error_message"></div>
                    </div>
                    <strong>Locations:</strong><br>
                    <div class="locations">
                        <div class="form-group location-field">
                            <input name="locations[]"  type="text" class="form-control">
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
        $(document).on('keyup', '.location-field input', function() {
            $('.location-field input').each(function(index) {
                var isBlank = !$(this).val();
                if(isBlank) {
                    $(this).remove()
                }
            });

            $('.locations').append($('<div class="form-group location-field">\n' +
                '                            <input name="locations[]"  type="text" class="form-control">\n' +
                '                        </div>'));

        });
    </script>
@endpush
