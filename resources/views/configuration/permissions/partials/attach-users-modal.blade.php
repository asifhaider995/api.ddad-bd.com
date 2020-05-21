<div class="modal fade" id="attachUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Attach user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form mb-2">
                    <input data-get_users_url="" type="text" placeholder="Search by name or email ..." class="form-control">
                </div>
                <div class="attachable-users">

                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script type="text/javascript">

        function loadUsers() {
            $.ajax({
                    url: $('input[data-get_users_url]').data('get_users_url'),
                    data: {
                        q: $('input[data-get_users_url]').val()
                    },
                    success: function (response) {
                        $('.attachable-users').html(response.html);
                    }
                }
            )
        }

        $('[data-get_users_url]').click(function() {
            $('input[data-get_users_url]').data('get_users_url', $(this).data('get_users_url'));
            loadUsers()
        });
        $('input[data-get_users_url]').change(loadUsers);
    </script>
@endpush
