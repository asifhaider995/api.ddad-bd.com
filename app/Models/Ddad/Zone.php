<?php

namespace App\Models\Ddad;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['name'];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function getDescriptionAttribute()
    {
        return $this->locations->pluck('name')->join(', ');
    }

    public function getNumberOfShopsAttribute()
    {
        return $this->shops()->count();
    }

    public function shops()
    {
        return $this->hasManyThrough(Shop::class, Location::class);
    }
}
