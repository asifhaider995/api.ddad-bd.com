
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
                <div class="custom-control custom-checkbox form-check-inline">
                    {{-- order is important! for custom checkboxs to work (input first, then label) --}}
                    <input class="custom-control-input" type="checkbox"
                           id="{{ $setting->name }}[{{ $option['value'] }}]"
                           name="{{ $setting->name }}[{{ $option['value'] }}]"
                           value="{{ $option['value'] }}"
                        {{ ( in_array($option['value'], $setting->value) ) ? 'checked' : ''  }}
                    >
                    <label class="custom-control-label" for="{{ $setting->name }}[{{ $option['value'] }}]">{{ $option['label'] ?? '' }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
