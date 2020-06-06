<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Shop;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index() {
        $playList = $this->demo();
        $loopDuration = array_sum(array_column($playList, 'duration_in_sec'));
        return [
            "server_time"=> "2020-04-10 23:10:10",
            "content_start_at"=> "2020-04-10 23:12:10",
            'loop_duration' => $loopDuration + 10,
            'playlist_duration' => $loopDuration,
            'loop_sync_content' => [
                'id' => $this->loopSyncContent('id'),
                'file_hash' => $this->loopSyncContent('file_hash')
            ],
            'play_list' => array_map(function($item) {
                return [
                    'id' => $item['id'],
                    'file_hash' => $item['file_hash'],
                    'duration_in_sec' => $item['duration_in_sec'],
                ];
            }, $playList)
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


    public function demo()
    {

        $jayParsedAry =
            [
                [
                    "id" => 1,
                    "type" => "video",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Alia+Bhatt+Sunsilk+shampoo+Ad+Instabun+TVC.mp4",
                    "duration_in_sec" => 50,
                    "file_hash" => "qazcdw21.mp4",
                    "file_size" => 10040000
                ],
                [
                    "id" => 2,
                    "type" => "video",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/MARLIA+ADS+-+XXX+SOAP+-+TELUGU++-+35+SEC+-+HD+-+2019.mp4",
                    "duration_in_sec" => 35,
                    "file_hash" => "7ujmnhytr.mp4",
                    "file_size" => 10040000
                ],
                [
                    "id" => 3,
                    "type" => "image",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Priya+Gold+Sunflower+Oil+Ad+Telugu+2020+-+Kajal+Aggarwal+-+Director+TD+RAJU+-+Thought+Sprinklers.mp4",
                    "duration_in_sec" => 31,
                    "file_hash" => "asdfghj.mp4",
                ],
                [
                    "id" => 4,
                    "type" => "video",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/TVC+Teer+Whole+Wheat+Atta.mp4",
                    "duration_in_sec" => 60,
                    "file_hash" => "098765.mp4",
                ],
                [
                    "id" => 5,
                    "type" => "video",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Teer+Whole+Wheat+Atta+TVC.mp4",
                    "duration_in_sec" => 51,
                    "file_hash" => "2wsxcde34rfv.mp4",
                ],

                [
                    "id" => 6,
                    "type" => "image",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Screenshot+2020-05-09+at+20.13.16.png",
                    "duration_in_sec" => 9,
                    "file_hash" => "20okse34rfv.png",
                ],

            ]
        ;

        return $jayParsedAry;
    }

    public function loopSyncContent($name)
    {
        return   [
            "id" => 6,
            "type" => "image",
            "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Screenshot+2020-05-09+at+20.13.16.png",
            "duration_in_sec" => 9,
            "file_hash" => "20okse34rfv.png",
        ][$name];
    }
}
