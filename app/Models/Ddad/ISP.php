<?php

namespace App\Models\Ddad;

use Illuminate\Database\Eloquent\Model;

class ISP extends Model
{
    protected $fillable = [
      'name', 'contact_person', 'mobile_number', 'package_price', 'package_name'
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class, 'isp_id');
    }

    public function getNumberOfConnectionsAttribute()
    {
        return $this->shops->count();
    }
}
