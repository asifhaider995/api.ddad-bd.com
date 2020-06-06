
    <div class="modal fade" id="unallocated-devices-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-createLabel">Unallocated Devices &nbsp;&nbsp;&nbsp;</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>TV</td>
                                <td>Detector</td>
                                <td>Android Box</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($unallocatedDevices as $device)
                                <tr>
                                    <td>{{ $device->tv_label ?: '-' }}</td>
                                    <td>{{ $device->detector_label ?: '-'}}</td>
                                    <td>{{ $device->android_label ?: '-'}}</td>
                                    <td>
                                        <a href="#" data-device='{!! json_encode($device) !!}' class="btn btn-secondary btn-sm attach">Attach</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.modal-content -->


        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@push('script')
    <script>
        $('.attach').on('click', function() {
            var device = $(this).data('device');

            $('[name="android_imei"]').val(device.android_imei)
                .closest('.st_level_up')
                .addClass('active2')
            $('[name="android_label"]').val(device.android_label)
                .closest('.st_level_up')
                .addClass('active2')
            $('[name="tv_label"]').val(device.tv_label)
                .closest('.st_level_up')
                .addClass('active2')
            $('[name="tv_serial"]').val(device.tv_serial)
                .closest('.st_level_up')
                .addClass('active2')
            $('[name="detector_label"]').val(device.detector_label)
                .closest('.st_level_up')
                .addClass('active2')
            $('[name="detector_serial"]').val(device.detector_serial)
                .closest('.st_level_up')
                .addClass('active2')

            $('.remove-allocated').show();
            $('[name=device_id]').val(device.id);
            $('.add-unallocated').hide();

            $('#unallocated-devices-modal').modal('hide');
        });
    </script>
@endpush
