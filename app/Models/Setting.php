<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $primaryKey = 'name';
    public $incrementing = false;

    public function getDataAttribute()
    {
        return unserialize($this->attributes['data']);
    }

    public function setDataAttribute(array $value)
    {
        $this->attributes['data'] = serialize($value);
    }


    public function getValueAttribute()
    {
        if($this->type == 'checkbox') {
            return explode(',', $this->attributes['value'] ?? '');
        }
        return $this->attributes['value'] ?? null;
    }

    public function setValueAttribute($value)
    {
        if($this->type == 'checkbox') {
            return $this->attributes['value'] =  implode(',', $value ?: []);
        }
        return $this->attributes['value'] = $value;
    }


    public static function pull($key) {
        return Cache::remember($key, 60*50, function() use($key) {
            $setting = self::find($key);
            return $setting ? $setting->value : null;
        });
    }

    public static function set($key, $value)
    {
        $setting = self::find($key);
        $setting->value =  $setting ? $value : null;
        $setting->save();
    }
}
