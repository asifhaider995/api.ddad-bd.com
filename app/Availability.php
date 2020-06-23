<?php

namespace App;

use App\Models\Ddad\Campaign;

class Availability
{
    protected $dates = [];

    public function __construct()
    {
        $this->start = now()->subDays(7)->startOfDay();
        $this->end  = now()->addDays(130)->endOfDay();
        $this->now = $this->start->clone();
        $this->campaigns = $this->campaigns();
        while ($this->now->lt($this->end)) {
            $slotCovers = 0;
            foreach ($this->campaigns as $campaign) {
                if($campaign->isRunningOnThatDay($this->now)) {
                    $slotCovers += $campaign->slotTime;
                }
            }
            $this->dates[formateDate($this->now)] = $slotCovers;
            $this->now->addDay();
        }
    }

    private function campaigns()
    {
        return Campaign::where(function($query) {
            $query->where(function($query) {
                $query->where('starting_date', '>', $this->start);
                $query->where('starting_date', '<', $this->end);
            });
            $query->orwhere(function($query) {
                $query->where('ending_date', '>', $this->start);
                $query->where('ending_date', '<', $this->end);
            });
        })->where('status', 'approved')->get();
    }

    public function getDates()
    {
        return $this->dates;
    }
}
