<?php

namespace App\Models\Ddad;

use Illuminate\Database\Eloquent\Model;

class ISP extends Model
{
    //

    public function shops()
    {
        return $this->hasMany(Shop::class, 'isp_id');
    }

    public function getNumberOfConnectionsAttribute()
    {
        return $this->shops->count();
    }
}
