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
        $device =ISP::create($request->all());
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
           'mobile_number' => 'required',
           'contact_person' => 'required',
           'name' => 'sometimes|required|unique:i_s_p_s,name',
           'package_name' => 'required',
           'package_price' => 'required',
        ];
    }

    public function edit(ISP $isp)
    {
        $this->viewData['isp'] = $isp;
        return view('ddad.isps.edit', $this->viewData);
    }


    public function update(ISP $isp, Request $request)
    {
        $rules = $this->rules();
        if($request->name == $isp->name) {
            $rules['name'] = 'required';
        }
        $request->validate($rules);
        $isp->update($request->all());
        flash("ISP updated");
        return redirect()->route('isps.index');
    }
}
