<?php

namespace App\Console;

use App\Console\Commands\RenewCampaign;
use App\Console\Commands\StoreTodaysPlaylist;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        RenewCampaign::class,
        StoreTodaysPlaylist::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('inspire')->hourly();
         $schedule->command('campaigns:renew')->dailyAt('5:00:00');
         $schedule->command('campaigns:store-todays-playlist')->dailyAt('5:00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
