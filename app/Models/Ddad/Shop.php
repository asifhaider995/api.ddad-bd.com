<?php

namespace App\Models\Ddad;

use App\Ddad\Payment;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shop extends Model
{
    protected $fillable = ['name', 'address', 'owner_name', 'owner_nid', 'nid_path', 'licence_path', 'kcp_name', 'kcp_mobile_number',
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

    public function getNidSrcAttribute()
    {
        return $this->nid_path ? Storage::url($this->nid_path) : Storage::url('placeholders/blank.jpg');
    }

    public function getLicenceSrcAttribute()
    {
        return $this->licence_path ? Storage::url($this->licence_path) : Storage::url('placeholders/blank.jpg');
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function totalPaidAmount()
    {
        return abs($this->payments()->sum('amount'));
    }

    private $countRunningAd = 0;
    public function countRunningAd()
    {
        if(!$this->countRunningAd)
        $this->countRunningAd = rand(0, 100);

        return $this->countRunningAd;
    }

    public function monthlyBill()
    {
        return $this->countRunningAd() * $this->payment_per_ad;
    }
}
