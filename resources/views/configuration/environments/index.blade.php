@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Environment variables</h2>
                    </div>
                </div>
                <div class="st_card_body">
                    <form method="post" action="{{ route('environments.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="st_height_25 st_height_lg_25"></div>
                        <div class="st_card_padd_25">
                            @foreach($environments as $environment)
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4 text-right">
                                            <label class="st_horizontal_label">
                                                <div class="st_horizontal_label_title">{{ $environment['key'] }}</div>
                                                <div class="st_horizontal_label_subtitle">{{ $environment['comment'] }}</div>
                                            </label>
                                        </div>
                                        <div class="col-sm-8">

                                            @switch($environment['key'])
                                                @case('CACHE_DRIVER')
                                                    <select class="st_selectpicker_lg st_selectpicker1"
                                                            id="env_{{ $environment['key'] }}"
                                                            name="{{ $environment['key'] }}"
                                                            data-size="7">
                                                        @foreach(['file', 'redis', 'memcached', 'database', 'redis', 'array'] as $env)
                                                            <option @if(old($environment['key'], $environment['value']) == $env) selected @endif value="{{ $env }}">{{ strtoupper($env) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @break
                                                @case('SESSION_DRIVER')
                                                    <select class="st_selectpicker_lg st_selectpicker1"
                                                            id="env_{{ $environment['key'] }}"
                                                            name="{{ $environment['key'] }}"
                                                            data-size="7">
                                                        @foreach(['file', 'cookie', 'database', 'memcached', 'redis', 'array'] as $env)
                                                            <option @if(old($environment['key'], $environment['value']) == $env) selected @endif value="{{ $env }}">{{ strtoupper($env) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @break
                                                @case('FILESYSTEM_DRIVER')
                                                    <select class="st_selectpicker_lg st_selectpicker1"
                                                            id="env_{{ $environment['key'] }}"
                                                            name="{{ $environment['key'] }}"
                                                            data-size="7">
                                                        @foreach(config('filesystems.disks') as $diskName => $disk)
                                                            <option @if(old($environment['key'], $environment['value']) == $diskName) selected @endif value="{{ $diskName }}">{{ strtoupper($diskName) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @break
                                                @case('APP_ENV')
                                                    <select class="st_selectpicker_lg st_selectpicker1"
                                                            id="env_{{ $environment['key'] }}"
                                                            name="{{ $environment['key'] }}"
                                                            data-size="7">
                                                        @foreach(['local', 'dev', 'uat', 'production'] as $env)
                                                            <option @if(old($environment['key'], $environment['value']) == $env) selected @endif value="{{ $env }}">{{ strtoupper($env) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @break
                                                @case('APP_DEBUG')
                                                    @foreach(['true', 'false'] as $value)
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="{{  $environment['key']  }}" id="{{ $environment['key']  }}_{{ $value }}" class="custom-control-input" value="false" @if( old($environment['key'], $environment['value']) == $value) checked @endif>
                                                            <label class="custom-control-label" for="{{ $environment['key']  }}_{{ $value }}">{{ ucfirst($value) }}</label>
                                                        </div>
                                                    @endforeach
                                                    @break
                                                @case('APP_KEY')
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="APP_KEY_PREVIEW" class="form-control " disabled value="{{ old($environment['key'], $environment['value']) }}">
                                                        <input type="hidden"
                                                               name="{{ $environment['key'] }}"
                                                               value="{{ old($environment['key'], $environment['value']) }}">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button">Generate</button>
                                                        </div>
                                                    </div>
                                                    @break

                                                @case('APP_URL')
                                                    <div class="input-group mb-3">
                                                        <input type="url"
                                                               class="form-control"
                                                               id="env_{{ $environment['key'] }}"
                                                               name="{{ $environment['key'] }}"
                                                               value="{{ old($environment['key'], $environment['value']) }}"
                                                        >
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button">This address</button>
                                                        </div>
                                                    </div>
                                                    @break
                                                @case('PUSHER_APP_SECRET')
                                                @case('AWS_SECRET_ACCESS_KEY')
                                                @case('MAIL_PASSWORD')
                                                @case('REDIS_PASSWORD')
                                                @case('DB_PASSWORD')
                                                    <div class="form-grop st_form_group_password">
                                                        <div class="form-control-wrap">
                                                            <input type="password"
                                                                   class="form-control st_password"
                                                                   id="env_{{ $environment['key'] }}"
                                                                   name="{{ $environment['key'] }}"
                                                                   value="{{ old($environment['key'], $environment['value']) }}"
                                                            >
                                                            <i class="st_password_eye material-icons">visibility</i>
                                                        </div>
                                                    </div>
                                                    @break

                                                @default
                                                    <input type="text"
                                                           class="form-control"
                                                           id="env_{{ $environment['key'] }}"
                                                           name="{{ $environment['key'] }}"
                                                           value="{{ old($environment['key'], $environment['value']) }}"
                                                    >
                                            @endswitch

                                            <input type="hidden" name="__comments[{{ $environment['key'] }}]" value="{{ $environment['comment'] }}">

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="st_height_25 st_height_lg_25"></div>
                            <div class="st_form_btns st_style1 text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <div class="st_height_25 st_height_lg_25"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
