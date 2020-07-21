<?php

namespace App\Models\Ddad;

use App\Ddad\Payment;
use App\HourlyPlaylist;
use App\Models\Location;
use App\Models\PlayTime;
use App\Models\User;
use App\Package;
use App\Placement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    public function renew()
    {
        $renewedObject = $this->replicate();
        $renewedObject->starting_date = $this->ending_date->addDay(1)->startOfDay();
        $renewedObject->ending_date = $renewedObject->starting_date->addMonths($renewedObject->duration_month)->endOfDay();
        $renewedObject->title = 'Renewed ('. ($renewedObject->starting_date->format('M'). ' to ' . $renewedObject->ending_date->format('M')) .') - ' . $this->title;
        $renewedObject->renewed_from = $this->id;
        $renewedObject->save();

        $this->auto_renew = false;
        $this->save();

        Log::info("Campaign renewed from $this->id to $renewedObject->id");
    }

    public function getReceivedAmountAttribute()
    {
        return $this->payments->sum('amount');
    }

    public function getTotalPurchasedPlaytime()
    {
        return $this->package->duration * $this->getRunningDay();
    }

    public function getTotalPlayedTime()
    {
        return $this->playTimes()->where('play_time', '<', now())->sum('duration');
    }

    public function getTotalPurchasedFrequency()
    {
        return $this->dailyFrequency  * $this->getRunningDay();
    }


    public function getTotalFrequency()
    {
        return $this->playTimes()->where('play_time', '<', now())->count();
    }

    public function getRunningDay()
    {
        return $this->starting_date->diffInDays($this->ending_date);
    }


    public function playTimes()
    {
        return $this->hasMany(PlayTime::class);
    }

    public function totalVisit()
    {
        $locationIds = $this->locations->pluck('id')->join(',');
        $end = now()->lt($this->ending_date) ? now() : $this->ending_date;
        $sql = "SELECT sum(number_of_audience) as total_audience FROM audiences where shop_id in(SElECT id as s_id from shops where location_id in($locationIds)) && created_at > '$this->starting_date' && created_at < '$end'";

        $result = DB::select(DB::raw($sql));
        $totalAudience = (int) $result[0]->total_audience;

        $campaignTotalPlayedTime = $this->getTotalPlayedTime();
        $totalCampaignPlayedTime = PlayTime::where('play_time','>', $this->starting_date)->where('play_time', "<", $end)->sum('duration');

        $campaignTotalAudience = ($campaignTotalPlayedTime/$totalCampaignPlayedTime) * $totalAudience;

        return $campaignTotalAudience;
    }
}
