<?php

namespace App\Models\Ddad;

use App\Ddad\Payment;
use App\HourlyPlaylist;
use App\Models\Location;
use App\Models\User;
use App\Package;
use App\Placement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'starting_date',
        'duration_month',
        'package',
        'placement',
    ];

    protected $dates = ['starting_date', 'ending_date'];

    public function getPackageAttribute()
    {
        $package = new Package($this->attributes['package'] ?? '');
        return $package;
    }

    public function getPlacementAttribute()
    {
        $placement = new Placement($this->attributes['placement'] ?? '');
        return $placement;
    }

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function getPrimarySrcAttribute()
    {
        return $this->primary_path ? Storage::url($this->primary_path) : null;
    }

    public function getSecondarySrcAttribute()
    {
        return $this->secondary_path ? Storage::url($this->secondary_path) : null;
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
        return $this->package->calculatePrice($this->countTV(), $this->duration_month);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function paidAmount()
    {
        return $this->payments->sum('amount');
    }

    public function dueAmount()
    {
        return $this->actual_price - $this->paidAmount();
    }

    public function getDailyFrequencyAttribute() {
        return $this->package->duration * 60 / $this->placement->duration;
    }

    public function getHourlyFrequencyAttribute() {
        $ert = setting_get('estimated_run_time');
        return $this->dailyFrequency * 60 /$ert;
    }

    public function getSlotTimeAttribute()
    {
        return $this->hourlyFrequency * $this->placement->duration;
    }

    public function isRunningOnThatDay(Carbon $carbon)
    {
        return $carbon->gte($this->starting_date) && $carbon->lte($this->ending_date);
    }

    public function getStatusAttribute()
    {
        return $this->attributes['status'] ?: 'awaiting_for_approval';
    }

    public function getCalculatedDurationAttribute()
    {
        return $this->placement->duration;
    }

    public function scopeBetween($query, $start, $end)
    {
        $query->where('starting_date', '<', $end);
        $query->where('ending_date', '>', $start);

        return $query;
    }

    public function calculateActualHourlyFrequency()
    {
        return app(HourlyPlaylist::class)->calculateFrequency($this);
    }
}
