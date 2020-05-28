<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Device;
use App\Models\Ddad\ISP;
use Illuminate\Http\Request;

class IspController extends Controller
{
    public function index()
    {
        $this->viewData['isps'] = ISP::all();
        return view('ddad.isps.index', $this->viewData);
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());
        $device =ISP::create($request);
        flash("Device successfully created")->success();

        return back();
    }

    public function destroy(ISP $isp)
    {
        $isp->delete();
        flash('Successfully deleted')->success();
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
}
