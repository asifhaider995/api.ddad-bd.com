<?php

namespace App;

use App\Models\Ddad\Campaign;

class HourlyPlaylist
{
    protected $playlist;
    protected $start;
    protected $end;


    public function playlist()
    {
        if ($this->playlist == null) {

            $this->start = now()->startOfDay();
            $this->end = now()->endOfDay();
            $playlist = [];
            $timeInSec = 0;
            $campaigns = $this->campaigns();
            $overflow = false;
            while (!$overflow && $campaigns->isNotEmpty()) {
                foreach ($campaigns as $campaign) {
                    $neededTime = $campaign->calculatedDuration;
                    if ($neededTime + $timeInSec <= 3600): //3600 sec or 1 hours
                        $play = [
                            'campaign_id' => $campaign->id,
                            'campaign_title' => $campaign->title,
                            'primary_src' => $campaign->primarySrc,
                            'secondary_src' => $campaign->secondarySrc,
                            'duration' => $neededTime,
                        ];
                        $playlist[] = $play;
                        $timeInSec += $neededTime;
                    else:
                        $overflow = true;
                        continue;
                    endif;
                }
            }
            $this->playlist = collect($playlist);
        }
        return $this->playlist;
    }

    private function campaigns()
    {
        return Campaign::between($this->start, $this->end)->where('status', 'approved')->orderBy('primary_queue')->get();
    }

    public function calculateFrequency(Campaign $campaign)
    {
        return $this->playlist()->where('campaign_id', $campaign->id)->count();
    }
}
