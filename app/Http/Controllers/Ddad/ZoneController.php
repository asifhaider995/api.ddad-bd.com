<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $this->viewData['zones'] = Zone::all();
        return view('ddad.zones.index', $this->viewData);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Zone::create($request->validate([
            'name' => 'required',
            'description'=> 'nullable',
        ]));

        if($request->ajax()) {
            return ['message' => "Zone successfully added."];
        }

        return redirect()->route('zones.index');
    }

    public function edit(Zone $zone)
    {
        $this->viewData['zone'] = $zone;

        return view('ddad.zones.edit', $this->viewData);
    }

    public function update(Zone $zone)
    {
        $zone->update(request()->validate([
            'name' => 'required',
            'description'=> 'nullable'
        ]));

        flash('Zone updated successfully!')->success();
        return redirect()->route('zones.edit', $zone);
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
        flash('Zone deleted successfully!')->success();
        return redirect()->route('zones.index');
    }
}
