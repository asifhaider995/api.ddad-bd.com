<!--  delete model -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modal-deleteLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-deleteLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4 class="text-danger mt-4">Are you sure?</h4>
                <p class="w-75 mx-auto text-muted">You won't be able to undo this action!</p>
            </div>
            <div class="modal-footer">
                <form id="delete-form" action="" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@push('script')
    <script type="text/javascript">
        //delete modal link setter
        $(document).on('click', '[data-delete_action]', function (event) {
            event.preventDefault();
            $('#delete-form').attr('action', $(this).data('delete_action'));
            $('#delete-modal').modal('show');
        });
    </script>
@endpush
