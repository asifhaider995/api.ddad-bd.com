@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Settings</h2>
                    </div>
                    <div class="st_card_head_right">
                        @if(setting_get('can_admin_backup'))
                            <a href="{{ route('settings.update-seeder') }}" class="btn btn-primary btn-sm">
                                <i class="material-icons">save</i>Backup
                            </a>
                        @endif
                    </div>
                </div>
                <div class="st_card_body">
                    <form method="post" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="st_height_25 st_height_lg_25"></div>
                        <div class="st_card_padd_25">
                            @foreach($settings as $setting)
                                @if(in_array($setting->type, config('setting.input_types')))
                                    @include('configuration.settings.partials.input', ['setting' => $setting])
                                @else
                                    @includeIf('configuration.settings.partials.' . $setting->type, ['setting' => $setting])
                                @endif
                            @endforeach

                            <div class="st_height_25 st_height_lg_25"></div>
                                <div class="st_form_btns st_style1 text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            <div class="st_height_25 st_height_lg_25"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
