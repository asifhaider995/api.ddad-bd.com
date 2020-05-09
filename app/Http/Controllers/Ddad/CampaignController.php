<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Shop;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index() {
        return $this->demo();
    }

    public function contentList() {
        $contentList = $this->demo();
        $contents = $contentList['content'];
        return array_map(function($item) {
            return [
                'src' => $item['src'],
                'file_hash' => $item['file_hash']
            ];
        },$contents);
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

        $jayParsedAry = [
            "server_time" => "2020-04-10 23:10:10",
            "content_start_at" => "2020-04-10 23:12:10",
            "total_loop_time" => 260,
            "loop_sync_content" => [
                "type" => "image",
                "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Screenshot+2020-05-09+at+20.13.16.png"
            ],
            "content" => [
                [
                    "id" => 1,
                    "type" => "video",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Alia+Bhatt+Sunsilk+shampoo+Ad+Instabun+TVC.mp4",
                    "duration_in_sec" => 50,
                    "file_hash" => "qazcdw21"
                ],
                [
                    "id" => 2,
                    "type" => "video",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/MARLIA+ADS+-+XXX+SOAP+-+TELUGU++-+35+SEC+-+HD+-+2019.mp4",
                    "duration_in_sec" => 35,
                    "file_hash" => "7ujmnhytr"
                ],
                [
                    "id" => 3,
                    "type" => "image",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Priya+Gold+Sunflower+Oil+Ad+Telugu+2020+-+Kajal+Aggarwal+-+Director+TD+RAJU+-+Thought+Sprinklers.mp4",
                    "duration_in_sec" => 31,
                    "file_hash" => "asdfghj"
                ],
                [
                    "id" => 4,
                    "type" => "video",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/TVC+Teer+Whole+Wheat+Atta.mp4",
                    "duration_in_sec" => 60,
                    "file_hash" => "098765"
                ],
                [
                    "id" => 5,
                    "type" => "video",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Teer+Whole+Wheat+Atta+TVC.mp4",
                    "duration_in_sec" => 51,
                    "file_hash" => "2wsxcde34rfv"
                ],

                [
                    "id" => 6,
                    "type" => "image",
                    "src" => "https://s3-ap-southeast-1.amazonaws.com/static.laralink.com/ddad/Screenshot+2020-05-09+at+20.13.16.png",
                    "duration_in_sec" => 9,
                    "file_hash" => "20okse34rfv"
                ],

            ]
        ];

        return $jayParsedAry;
    }
}
