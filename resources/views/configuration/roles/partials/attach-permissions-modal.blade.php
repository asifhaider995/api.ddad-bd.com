<div class="modal fade" id="attachPermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Attach permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form mb-2">
                    <input data-get_permissions_url="" type="text" placeholder="Search by name or email ..." class="form-control">
                </div>
                <div class="attachable-permissions"></div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script type="text/javascript">

        function loadPermissions() {
            $.ajax({
                    url: $('input[data-get_permissions_url]').data('get_permissions_url'),
                    data: {
                        q: $('input[data-get_permissions_url]').val()
                    },
                    success: function (response) {
                        $('.attachable-permissions').html(response.html);
                    }
                }
            )
        }

        $('[data-get_permissions_url]').click(function() {
            $('input[data-get_permissions_url]').data('get_permissions_url', $(this).data('get_permissions_url'));
            loadPermissions()
        });
        $('input[data-get_permissions_url]').change(loadPermissions);
    </script>
@endpush
