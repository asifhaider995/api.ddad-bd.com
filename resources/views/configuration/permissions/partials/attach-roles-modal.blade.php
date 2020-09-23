<div class="modal fade" id="attachRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Attach role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form mb-2">
                    <input data-get_roles_url="" type="text" placeholder="Search by name or email ..." class="form-control">
                </div>
                <div class="attachable-roles"></div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script type="text/javascript">

        function loadRoles() {
            $.ajax({
                    url: $('input[data-get_roles_url]').data('get_roles_url'),
                    data: {
                        q: $('input[data-get_roles_url]').val()
                    },
                    success: function (response) {
                        $('.attachable-roles').html(response.html);
                    }
                }
            )
        }

        $('[data-get_roles_url]').click(function() {
            $('input[data-get_roles_url]').data('get_roles_url', $(this).data('get_roles_url'));
            loadRoles()
        });
        $('input[data-get_roles_url]').change(loadRoles);
    </script>
@endpush
