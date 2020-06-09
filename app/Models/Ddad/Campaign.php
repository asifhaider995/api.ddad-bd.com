<?php

namespace App\Models\Ddad;

use App\Models\Location;
use App\Models\User;
use App\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'starting_date',
        'ending_date',
        'package',
    ];

    protected $dates = ['starting_date', 'ending_date'];

    public function getPackageAttribute()
    {
        $package = new Package($this->attributes['package'] ?? '');
        return $package;
    }

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function getPrimarySrcAttribute()
    {
        return Storage::url($this->primary_path);
    }

    public function getSecondarySrcAttribute()
    {
        return Storage::url($this->secondary_path);
    }


    public function getTotalViewsAttribute()
    {
        return rand(1, 1000);
    }

    public function locationsIds()
    {
        return $this->locations->pluck('id')->toArray();
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function countTV()
    {
        return Package::countNumberOfTV($this->locations->pluck('id')->toArray());
    }

    public function calculatePrice()
    {
        return $this->package->calculatePrice($this->countTV(), $this->starting_date, $this->ending_date);
    }
}
