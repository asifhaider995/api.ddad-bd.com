
<div class="form-group">
    <div class="row">
        <div class="col-sm-4 text-right">
            <label class="st_horizontal_label">
                <div class="st_horizontal_label_title">{{ $setting->title }}</div>
                <div class="st_horizontal_label_subtitle">{{ $setting->subtitle }}</div>
            </label>
        </div>
        <div class="col-sm-4">
            <select name="{{ $setting->name }}" class="st_selectpicker1" data-size="7" id="setting_{{ $setting->name }}" >
                <option  value="">(None selected)</option>
                @foreach((array) $setting->data['options'] ?? [] as $option)
                    <option {{ old($setting->name, $setting->value) == $option['value'] ? 'selected' : ''  }} value="{{ $option['value'] ?? '' }}">{{ $option['label'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

