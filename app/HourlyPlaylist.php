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
            $timeInSec = 0;
            $campaigns = $this->campaigns();
            $overflow = false;

            $campaignPlays = [];
            //First add the purchased frequency
            foreach ($campaigns as $campaign) {
                $play = [
                    'campaign_id' => $campaign->id,
                    'campaign_title' => $campaign->title,
                    'primary_src' => $campaign->primarySrc,
                    'secondary_src' => $campaign->secondarySrc,
                    'duration' => $campaign->calculatedDuration,
                ];
                $campaignPlays[$campaign->id] = array_fill(0, $campaign->hourlyFrequency, $play);
                $timeInSec  += $campaign->hourlyFrequency * $campaign->calculatedDuration;
            }

            /*Giving bonus*/
            while (!$overflow && $campaigns->isNotEmpty()) {
                $frequencySegments = $campaigns->pluck('hourlyFrequency')->sort();
                foreach($frequencySegments as $hourlyFrequency) {
                    foreach ($campaigns as $campaign) {
                        if($campaign->hourlyFrequency < $hourlyFrequency) {
                            break;
                        }
                        $neededTime = $campaign->calculatedDuration;
                        if ($neededTime + $timeInSec <= 3600): //3600 sec or 1 hours
                            $play = [
                                'campaign_id' => $campaign->id,
                                'campaign_title' => $campaign->title,
                                'primary_src' => $campaign->primarySrc,
                                'secondary_src' => $campaign->secondarySrc,
                                'duration' => $neededTime,
                            ];
                            $campaignPlays[$campaign->id][] = $play;

                            $timeInSec += $neededTime;
                        else:
                            $overflow = true;
                            continue;
                        endif;
                    }
                }
            }


//            dd($timeInSec);
            /**Generating playlist**/
            $totalPlay = 0;
            foreach($campaignPlays as $campaignPlay)
                $totalPlay += count($campaignPlay);

            foreach($campaignPlays as $j => $campaignPlay) {
                $every = $totalPlay / count($campaignPlay);
                $p = 0;
                foreach($campaignPlay as $i => $play) {
                    $campaignPlays[$j][$i]['priority'] = $p;
                    $p += $every;
                }
            }

            $playlist = array_merge(...$campaignPlays);

            usort($playlist, function($a, $b) {
               return $a['priority'] > $b['priority'];
            });


            // Re-organize to remove consecutive play same ad
            $cs = [];
            if($campaigns->count() > 2) {
                for($i = 0; $i < $totalPlay - 1; $i++)
                {
                    if($playlist[$i]['campaign_id'] == $playlist[$i+1]['campaign_id']) {
                        $cs[$i] = $playlist[$i];
                        unset($playlist[$i]);
                    }
                }

                $playlist = array_values($playlist);
                while($cs && $play = array_pop($cs)) {
                    $countItem = count($playlist) - 1;
                    for ($i = $countItem; $i > 0; $i--) {
                        $x = $playlist[$i]['campaign_id'] !== $play['campaign_id'];
                        $y = $playlist[$i - 1]['campaign_id'] !== $play['campaign_id'];
                        if ($x && $y) {
                            array_splice($playlist, $i, 0, [$play]);
                            break;
                        }
                    }
                }
            }

            $this->playlist = collect($playlist);
        }

        return $this->playlist;
    }

    private function campaigns()
    {
        $this->start = now()->startOfDay();
        $this->end = now()->endOfDay();
        return Campaign::between($this->start, $this->end)->where('status', 'approved')->orderBy('primary_queue')->get();
    }

    public function calculateFrequency(Campaign $campaign)
    {
        return $this->playlist()->where('campaign_id', $campaign->id)->count();
    }
}
