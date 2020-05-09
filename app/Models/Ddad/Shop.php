<?php

namespace App\Models\Ddad;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'address', 'owner_name', 'owner_nid', 'document_path', 'kcp_name', 'kcp_mobile_number',
        'payment_per_ad', 'average_visit', 'status', 'payment_due_date', 'zone_id', 'detector_id', 'tv_id', 'android_box_id', 'isp_id', ];
}
