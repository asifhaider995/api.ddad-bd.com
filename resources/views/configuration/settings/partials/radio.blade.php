
<div class="form-group">
    <div class="row">
        <div class="col-sm-4 text-right">
            <label class="st_horizontal_label">
                <div class="st_horizontal_label_title">{{ $setting->title }}</div>
                <div class="st_horizontal_label_subtitle">{{ $setting->subtitle }}</div>
            </label>
        </div>
        <div class="col-sm-8 align-self-center">
            @foreach((array) $setting->data['options'] ?? [] as $option)
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio"
                           id="{{ $option['value'] ?? '' }}"
                           name="{{ $setting->name }}"
                           value="{{ $option['value'] ?? '' }}"
                        {{ old($setting->name, $setting->value) === $option['value'] ? 'checked' : ''  }}
                    >
                    <label class="custom-control-label" for="{{ $option['value'] ?? '' }}">{{ $option['label'] ?? '' }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
