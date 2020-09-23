
<div class="form-group">
    <div class="row">
        <div class="col-sm-4 text-right">
            <label class="st_horizontal_label">
                <div class="st_horizontal_label_title">{{ $setting->title }}</div>
                <div class="st_horizontal_label_subtitle">{{ $setting->subtitle }}</div>
            </label>
        </div>
        <div class="col-sm-4">
            <input type="{{ $setting->type }}"
                   class="form-control"
                   id="setting_{{ $setting->name }}"
                   name="{{ $setting->name }}"
                   max="{{ $setting->data['max_length'] ?? '' }}"
                   min="{{ $setting->data['min_length'] ?? '' }}"
                   @if ($setting->data['is_required']) required @endif
                   value="{{ old($setting->name, $setting->value) }}"
            >
        </div>
    </div>
</div>
