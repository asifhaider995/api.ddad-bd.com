<?php

namespace App\Console\Commands;

use App\HourlyPlaylist;
use App\Models\Ddad\Campaign;
use App\Models\PlayTime;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class StoreTodaysPlaylist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaigns:store-todays-playlist';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Renew campaign that should renew';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(PlayTime::whereDate('created_at', Carbon::today())->count()) {
            Log::info("Today's playlist already generated");
            $this->info("Today's playlist already generated");
            return;
        }

        $playlist = app(HourlyPlaylist::class);
        $sec = 0;
        foreach($playlist->playlist() as $play) {
            for ($i = 7; $i < 23; $i++) {
                $playTimestam = now()->startOfDay()->addHour($i)->addSecond($sec);
                $playTime = new PlayTime();
                $playTime->play_time = $playTimestam;
                $playTime->campaign_id = $play['campaign_id'];
                $playTime->duration = $play['duration'];
                $playTime->save();
            }
            $sec+= $play['duration'];
        }
    }
}
