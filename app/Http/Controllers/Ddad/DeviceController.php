<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $this->viewData['devices'] = Device::all();
        return view('ddad.devices.index', $this->viewData);
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $device =Device::create($request->only([
            'android_label', 'android_imei', 'detector_label', 'detector_serial', 'tv_label', 'tv_serial'
        ]));
        flash("Device successfully created")->success();

        return back();
    }


    private function rules()
    {
        return [
            'android_label' => 'required_with:android_imei|required_without_all:detector_label,tv_label',
            'android_imei' => 'required_with:android_label',
            'detector_label' => 'required_with:detector_serial|required_without_all:android_label,tv_label',
            'detector_serial' => 'required_with:detector_label',
            'tv_label' => 'required_with:tv_serial|required_without_all:detector_label,android_label',
            'tv_serial' => 'required_with:tv_label',
        ];
    }

    public function edit(Device $device)
    {
        $this->viewData['device'] = $device;
        return view('ddad.devices.edit', $this->viewData);
    }

    public function update(Request $request, Device $device)
    {
        $request->validate($this->rules());
        $device->update($request->all());
        flash("Your device successfully updated")->success();

        return redirect()->route('devices.index');
    }
}
