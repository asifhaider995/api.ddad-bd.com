<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ddad\CampaignRequest;
use App\Http\Requests\Ddad\ShopRequest;
use App\Models\Ddad\AndroidBox;
use App\Models\Ddad\Campaign;
use App\Models\Ddad\Detector;
use App\Models\Ddad\Device;
use App\Models\Ddad\ISP;
use App\Models\Ddad\Shop;
use App\Models\Ddad\TV;
use App\Models\Ddad\Zone;
use App\Models\Location;
use App\Models\User;
use App\Package;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function index()
    {
        $this->viewData['campaigns'] = Campaign::all();
        return view('ddad.campaigns.index', $this->viewData);
    }

    public function create()
    {
        $this->viewData['locations'] = Location::all();
        $this->viewData['clients'] = User::clients()->get();
        $this->viewData['packages'] = Package::all();

        return view('ddad.campaigns.create', $this->viewData);
    }

    public function calculate(Request $request)
    {
        $numberOfTv = Shop::whereIn('location_id', $request->locations ?: [])
            ->whereNotNull('device_id')
            ->count();

        $package = new Package($request->package ?: '');

        $startingDate = $request->starting_date ? Carbon::createFromFormat('Y-m-d', $request->starting_date) : now();
        $endingDate = $request->ending_date ? Carbon::createFromFormat('Y-m-d', $request->ending_date) : now();
        $diffInDays = $startingDate->diffInDays($endingDate);

        $totalPrice = $package->rate * $numberOfTv * ($diffInDays + 1);

        return [
            'total_price' => $totalPrice,
            'number_of_tv' => $numberOfTv,
        ];
    }

    public function store(CampaignRequest $request)
    {
        $campaign = new Campaign($request->all());

        if(Auth::user()->isAdmin()) {
            $campaign->client_id = $request->client_id;
            $campaign->reviewer_id = Auth::id();
            $campaign->reviewer_note = $request->reviewer_note;
            $campaign->status = $request->status;
        } else {
            $campaign->client_id = Auth::id();
            $campaign->status = 'awaiting_for_approval';
        }
        $campaign->video_path = $campaign->video ? $campaign->video->store("campaigns/{$campaign->client_id}/videos") : null;
        $campaign->image_path = $campaign->image ? $campaign->image->store("campaigns/{$campaign->client_id}/images") : null;
        $campaign->auto_renew = (boolean) $request->auto_renew;
        $campaign->save();
        $campaign->locations()->sync($request->locations);

        flash('Campaign successfully created ')->success();

        return redirect()->route('campaigns.index');
    }

    public function edit(Campaign $campaign)
    {
        $this->viewData['locations'] = Location::all();
        $this->viewData['campaign'] = $campaign;
        $this->viewData['clients'] = User::clients()->get();
        $this->viewData['packages'] = Package::all();

        return view('ddad.campaigns.edit', $this->viewData);
    }

    public function update(CampaignRequest $request, Campaign $campaign)
    {
        if(Auth::user()->isAdmin()) {
            $campaign->client_id = $request->client_id;
            $campaign->reviewer_id = Auth::id();
            $campaign->reviewer_note = $request->reviewer_note;
            $campaign->status = $request->status;

            $campaign->locations()->sync($request->locations);
            $campaign->starting_date = $request->starting_date;
            $campaign->ending_date = $request->ending_date;
            $campaign->package = $request->package;

        } else {
            $campaign->client_id = Auth::id();
            $campaign->status = 'awaiting_for_approval';
        }
        if($campaign->video) {
            $campaign->video_path = $campaign->video->store("campaigns/{$campaign->client_id}/videos");
        }

        if($campaign->image) {
            $campaign->video_path = $campaign->video->store("campaigns/{$campaign->client_id}/videos");
        }
        $campaign->title = $request->title;
        $campaign->auto_renew = (boolean) $request->auto_renew;
        $campaign->save();

        flash('Campaign successfully updated')->success();
        return redirect()->route('campaigns.edit', $campaign);
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        flash('Shop deleted successfully!')->success();
        return redirect()->route('shops.index');
    }

    public function show(Shop $shop)
    {
        $this->viewData['shop'] = $shop;

        return view('ddad.shops.show', $this->viewData);
    }
}
