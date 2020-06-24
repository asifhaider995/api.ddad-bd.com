<?php

namespace App\Http\Controllers\Api;

use App\HourlyPlaylist;
use App\Http\Controllers\Controller;
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

    public function contentList() {
        return array_map(function($item) {
            return [
                'src' => $item['src'],
                'file_hash' => $item['file_hash'],
                'type' => $item['type'],
            ];
        }, $this->demo());
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required',
            'content_id' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
        ]);
        return [
            "message" => "success",
            "request_id" => time()
        ];
    }



    public function loopSyncContent()
    {
        return   [
            "id" => null,
            "type" => "image",
            "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Screenshot+2020-05-09+at+20.13.16.png",
            "duration_in_sec" => null,
            "file_hash" => "20okse34rfv.png",
        ];
    }
}
