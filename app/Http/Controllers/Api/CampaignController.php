<?php

namespace App\Http\Controllers\Api;

use App\HourlyPlaylist;
use App\Http\Controllers\Controller;
use App\Models\Audience;
use App\Models\CampaignPlay;
use App\Models\Ddad\AndroidBox;
use App\Models\Ddad\Device;
use App\Models\Ddad\Shop;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(HourlyPlaylist $playlist) {

        $playlist->playlist();
        return [
            "server_time"=> now(),
            'loop_sync_content' => $this->loopSyncContent(),
            'play_list' => $playlist->playlist(),
        ];
    }

    public function saveCampaignPlay(Request $request)
    {
        $request->validate([
            'campaign_type' => 'required',
            'android_imei'     => 'required_if:campaign_type,==,campaign',
            'campaign_id'   => 'required_if:campaign_type,==,campaign',
            'started_at'    => 'required_if:campaign_type,==,campaign',
            'ended_at'      => 'required_if:campaign_type,==,campaign',
            'content_type'  => 'required_if:campaign_type,==,campaign',
        ]);


            $cp = new CampaignPlay();
            $cp->fill($request->all());

            $device = Device::where('android_imei', $request->android_imei)->whereHas('shop')->firstOrFail();

            $cp->shop_id = $device->shop->id;
            $cp->save();


        return [
            "message" => "success",
            "request_id" => time(),
            "campaign_play_id" => $cp->id,
        ];
    }



    public function saveAudience(Request $request)
    {
        $request->validate([
            'detector_serial'      => 'required',
            'number_of_audience'   => 'required',
        ]);

        $audience = new Audience();
        $audience->fill($request->all());

        $device = Device::where('detector_serial', $request->detector_serial)->firstOrFail();
        $audience->shop_id = $device->shop->id;
        $audience->save();

        return $audience ? "Saved : " . $audience->id : "Not saved";
    }



    public function loopSyncContent()
    {
        return   [
            "id" => null,
            'type' => 'video',
            "src" => setting_get('loop_sync_content_url'),
        ];
    }
}
