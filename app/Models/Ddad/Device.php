<?php

namespace App\Models\Ddad;

use App\Models\Audience;
use App\Models\CampaignPlay;
use App\Models\PlayTime;
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
        return $this->detector_serial && !CampaignPlay::where('android_imei', $this->android_imei)->where('created_at', now()->subMinute(5))->exists();
    }

    public function detectorAlerts()
    {
        return $this->detector_serial && !Audience::where('detector_serial', $this->detector_serial)->where('created_at', now()->subMinute(60))->exists();
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
