@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Client: {{ $user->company_name }}</h2>
                    </div>
                </div>
                <div class="st_card_body">
                    <h2>Under construction</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="st_height_25 st_height_lg_25"></div>
@endsection


@push('script')
    <script type="text/javascript">
        $('.remove-allocated').click(function() {
            $('.remove-allocated').hide();
            $('[name=device_id]').val(null);
            $('.add-unallocated').show();

            $('[name="android_imei"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="android_label"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="tv_label"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="tv_serial"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="detector_label"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
            $('[name="detector_serial"]').val('')
                .closest('.st_level_up')
                .removeClass('active2')
        })
    </script>
@endpush
