<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ddad\ShopRequest;
use App\Models\Ddad\AndroidBox;
use App\Models\Ddad\Detector;
use App\Models\Ddad\Device;
use App\Models\Ddad\ISP;
use App\Models\Ddad\Shop;
use App\Models\Ddad\TV;
use App\Models\Ddad\Zone;
use App\Models\Location;

class ShopController extends Controller
{
    public function index()
    {
        $this->viewData['shops'] = Shop::all();
        $this->viewData['zones'] = Zone::all();
        return view('ddad.shops.index', $this->viewData);
    }

    public function create()
    {
        $this->viewData['locations'] = Location::all();
        $this->viewData['isps'] = ISP::all();
        $this->viewData['unallocatedDevices'] = Device::unallocated()->get();

        return view('ddad.shops.create', $this->viewData);
    }

    public function store(ShopRequest $request)
    {
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
            'nid_path' => $request->nid ? $request->nid->store('shops/nid') : null,
            'licence_path' => $request->licence ? $request->nid->store('shops/licence') : null,
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
            'nid_path' => $request->nid ? $request->nid->store('shops\nid') : $shop->nid_path,
            'licence_path' => $request->licence ? $request->licence->store('shops\licence') : $shop->licence_path,
        ]));

        flash('Shop successfully updated ')->success();
        return redirect()->route('shops.index', $shop);
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
