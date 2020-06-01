<?php

namespace App\Models\Ddad;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shop extends Model
{
    protected $fillable = ['name', 'address', 'owner_name', 'owner_nid', 'document_path', 'kcp_name', 'kcp_mobile_number',
        'payment_per_ad', 'average_visit', 'status', 'payment_due_date', 'location_id', 'isp_id', 'device_id'
    ];

    public function isp()
    {
        return $this->belongsTo(ISP::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }


    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function getDocumentSrcAttribute()
    {
        return $this->document_path ? Storage::url($this->document_path) : null;
    }
}
