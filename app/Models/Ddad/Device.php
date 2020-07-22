<?php

namespace App\Models\Ddad;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //
    protected $fillable = [
        'android_imei',
        'android_label',
        'tv_label',
        'tv_serial',
        'detector_label',
        'detector_serial',
    ];

    public function tvAlerts()
    {
        return $this->androidAlerts();
    }

    public function androidAlerts()
    {
        return rand(0,2);
    }

    public function detectorAlerts()
    {
        return rand(0,2);
    }

    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

    public function scopeUnallocated($query)
    {
        return $query->doesntHave('shop');
    }

    public function isBlankBox()
    {
        foreach($this->fillable as $item) {
            if($this->{$item}) {
               return false;
            }
        }
        return true;
    }
}
