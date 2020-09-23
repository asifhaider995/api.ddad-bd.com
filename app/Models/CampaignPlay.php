<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignPlay extends Model
{
    protected $fillable = [
        'campaign_type',
        'android_imei',
        'campaign_id',
        'started_at',
        'ended_at',
        'content_type'
    ];
}
