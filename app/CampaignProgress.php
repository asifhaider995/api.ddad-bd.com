<?php

namespace App;

use App\Models\Ddad\Campaign;
use App\Models\Ddad\Shop;

class CampaignProgress
{
    protected $campaign;
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    public function progressByTimeline()
    {
        $totalDay = ($this->campaign->starting_date)->diffInDays($this->campaign->ending_date);
        $runingDay = $this->campaign->starting_date->diffInDays(now());

        $percentage = (int) (($runingDay / $totalDay) * 100);
        return min(100, $percentage);
    }

    public function progressByPlaytime()
    {
        $ab = $this->campaign->getTotalPlayedTime() / 60;
        $cd = $this->campaign->getTotalPurchasedPlaytime();
        $cd = $cd < 1 ? 1 : $cd;
        $percentage = (int) (($ab / $cd) * 100);
        return min(100, $percentage);
    }


    public function progressByFrequency()
    {
        $ab = $this->campaign->getTotalFrequency();
        $cd = $this->campaign->getTotalPurchasedFrequency();
        $cd = $cd < 1 ? 1 : $cd;
        $percentage = (int) (($ab / $cd) * 100);
        return min(100, $percentage);
    }

    public function costConsumption()
    {
        $totalDay = ($this->campaign->starting_date)->diffInDays($this->campaign->ending_date);
        $runingDay = $this->campaign->starting_date->diffInDays(now());

        return $this->campaign->actual_price * ($runingDay / $totalDay);
    }

    public function costPerMinutes()
    {
        $played = $this->campaign->playTimes()->sum('duration') / 60;
        $cd = $this->campaign->getTotalPurchasedPlaytime();
        $perMinCost= $this->campaign->actual_price / $cd;
        return (int)( $perMinCost * $played);
    }

    public function costPerMinutesPerTV()
    {
       $played =  $this->campaign->playTimes()->sum('duration');

       $this->shopsHasTV = [];
       $this->campaign->locations->each(function($location){
           $location->shops->each(function ($shop)  {
                if($shop->device) {
                    $this->shopsHasTV[] = $shop->id;
                }
           });
       });
       $numberOfTv = count($this->shopsHasTV);

       $temp = $played * $numberOfTv;
       $temp = $temp > 0 ? $temp : 1;
       return intval($this->campaign->actual_price / $temp);
    }

}
