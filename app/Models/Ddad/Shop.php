<?php

namespace App\Models\Ddad;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'address', 'owner_name', 'owner_nid', 'document_path', 'kcp_name', 'kcp_mobile_number',
        'payment_per_ad', 'average_visit', 'status', 'payment_due_date', 'zone_id', 'detector_id', 'tv_id', 'android_box_id', 'isp_id',
    ];

    public function isp()
    {
        return $this->belongsTo(ISP::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function androidBox()
    {
        return $this->belongsTo(AndroidBox::class);
    }

    public function detector()
    {
        return $this->belongsTo(Detector::class);
    }

    public function tv()
    {
        return $this->belongsTo(TV::class);
    }
}
