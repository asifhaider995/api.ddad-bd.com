<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ddad\ShopRequest;
use App\Models\Ddad\AndroidBox;
use App\Models\Ddad\Detector;
use App\Models\Ddad\ISP;
use App\Models\Ddad\Shop;
use App\Models\Ddad\TV;
use App\Models\Ddad\Zone;

class ShopController extends Controller
{
    public function index()
    {
        $this->viewData['shops'] = Shop::all();

        return view('ddad.shops.index', $this->viewData);
    }

    public function create()
    {
        $this->viewData['zones'] = Zone::all();
        $this->viewData['detectors'] = Detector::all();
        $this->viewData['tvs'] = TV::all();
        $this->viewData['android_boxes'] = AndroidBox::all();
        $this->viewData['isps'] = ISP::all();

        return view('ddad.shops.create', $this->viewData);
    }

    public function store(ShopRequest $request)
    {
        Shop::create($request->all());

        if($request->ajax()) {
            return ['message' => "Shop successfully added."];
        }

        flash('Shop successfully added.')->success();
        return redirect()->route('shops.index');
    }

    public function edit(Shop $shop)
    {
        $this->viewData['shop'] = $shop;
        $this->viewData['zones'] = Zone::all();
        $this->viewData['detectors'] = Detector::all();
        $this->viewData['tvs'] = TV::all();
        $this->viewData['android_boxes'] = AndroidBox::all();
        $this->viewData['isps'] = ISP::all();

        return view('ddad.shops.edit', $this->viewData);
    }

    public function update(ShopRequest $request, Shop $shop)
    {
        $shop->update($request->all());

        flash('Shop updated successfully!')->success();
        return redirect()->route('shops.edit', $shop);
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        flash('Shop deleted successfully!')->success();
        return redirect()->route('shops.index');
    }
}
