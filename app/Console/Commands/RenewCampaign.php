<?php

namespace App\Console\Commands;

use App\Models\Ddad\Campaign;
use App\Models\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class RenewCampaign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaigns:renew';

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
        $renewableCampaigns = Campaign::where('status', 'approved')->where('auto_renew', 1)->where('ending_date', '<', now())->get();
        $msg = sprintf("Renewing %d campaign", $renewableCampaigns->count());
        Log::info($msg);
        $this->info($msg);
        foreach($renewableCampaigns as $renewableCampaign) {
            $renewableCampaign->renew();
            $msg = sprintf("Renewing Campaign:[%s], %s", $renewableCampaign->id, $renewableCampaign->title);
            $this->info($msg);
            Log::info($msg);
        }

        $msg = "Campaign renew finished";
        Log::info($msg);
        $this->info($msg);
    }
}
