<?php

namespace App\Models;

use App\Models\Ddad\Zone;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'zone_id'];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
