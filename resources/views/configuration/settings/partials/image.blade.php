
<div class="form-group">
    <div class="row">
        <div class="col-sm-4 text-right">
            <label class="st_horizontal_label">
                <div class="st_horizontal_label_title">{{ $setting->title }}</div>
                <div class="st_horizontal_label_subtitle">{{ $setting->subtitle }}</div>
            </label>
        </div>
        <div class="col-sm-8">
            <img src="{{ $setting->value ? Storage::url($setting->value) : asset('images/errors/img-not-found.png') }}" style="max-height: 100px;" class=" @if($setting->data['rounded']) rounded @endif" alt="">
            <br>
            <input type="file" name="{{ $setting->name }}" accept="image/*">
        </div>
    </div>
</div>
