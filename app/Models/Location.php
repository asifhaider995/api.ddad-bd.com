<?php

namespace App\Models;

use App\Models\Ddad\Campaign;
use App\Models\Ddad\Shop;
use App\Models\Ddad\Zone;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'zone_id'];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class);
    }
}
