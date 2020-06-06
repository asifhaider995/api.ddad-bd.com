<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        return  $this->calculate($request);

        if($request->device_id) {
            $device = Device::find($request->device_id);
        } else  {
            $device = new Device();
        }
        $device->fill($request->only([
            'android_label', 'android_imei', 'android_serial', 'detector_label', 'detector_serial', 'tv_label', 'tv_serial'
        ]));
        if(!$device->isBlankBox()) {
            $device->save();
        }

        Shop::create(array_merge($request->all(), [
            'device_id' => $device->id,
            'document_path' => $request->document ? $request->document->store('shops') : null,
        ]));

        flash('Shop successfully created ')->success();

        return redirect()->route('shops.index');
    }

    public function edit(Shop $shop)
    {
        $this->viewData['locations'] = Location::all();
        $this->viewData['isps'] = ISP::all();
        $this->viewData['unallocatedDevices'] = Device::unallocated()->get();
        $this->viewData['shop'] = $shop;

        return view('ddad.shops.edit', $this->viewData);
    }

    public function update(ShopRequest $request, Shop $shop)
    {
        if($request->device_id) {
            $device = Device::find($request->device_id);
        } else  {
            $device = new Device();
        }
        $device->fill($request->only([
            'android_label',  'android_imei', 'android_serial', 'detector_label', 'detector_serial', 'tv_label', 'tv_serial'
        ]));

        if(!$device->isBlankBox()) {
            $device->save();
        }


        $shop->update(array_merge($request->all(), [
            'device_id' => $device->id,
            'document_path' => $request->document ? $request->document->store('shops') : null,
        ]));

        flash('Shop successfully updated ')->success();
        return redirect()->route('shops.edit', $shop);
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
