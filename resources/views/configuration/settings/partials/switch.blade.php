
{{--<div class="form-group row">--}}
{{--    <div class="col-4 text-right">--}}
{{--        <div class="control-label" for="setting_{{ $setting->id }}">{{ $setting->title }}:</div>--}}
{{--        <small id="emailHelp" class="form-text text-muted">--}}
{{--            {{ $setting->subtitle }}--}}
{{--        </small>--}}
{{--    </div>--}}
{{--    <div class="col-4">--}}
{{--        <input name="{{ $setting->name }}" type="checkbox" @if($setting->value) checked @endif data-toggle="switchbutton" value="1" data-onstyle="success" data-offstyle="secondary" data-onlabel="{{ $setting->data['onlabel'] }}" data-offlabel="{{ $setting->data['offlabel'] }}">--}}
{{--    </div>--}}
{{--</div>--}}


<div class="form-group">
    <div class="row">
        <div class="col-sm-4 text-right">
            <label class="st_horizontal_label">
                <div class="st_horizontal_label_title">{{ $setting->title }}</div>
                <div class="st_horizontal_label_subtitle">{{ $setting->subtitle }}</div>
            </label>
        </div>
        <div class="col-sm-8">
            <div class="st_switch st_style1 st_secondary_switch">
                <input type="checkbox"
                       id="{{ $setting->name }}"
                       name="{{ $setting->name }}"
                       value="1"
                       @if($setting->value) checked @endif
                >
                <span></span>
            </div>
        </div>
    </div>
</div>
