<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Zone;
use App\Models\Location;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $this->viewData['zones'] = Zone::all();
        return view('ddad.zones.index', $this->viewData);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'locations' => 'required|array|min:2'
        ]);


        $locationNames = array_filter($request->locations);
        $locations = [];

        $zone = Zone::create($request->validate([
            'name' => 'required',
        ]));

        foreach($locationNames as $locationName) {
            $locations[] = new Location(['name' => $locationName]);
        }

        $zone->locations()->saveMany($locations);

        flash('Your zone successfully creted')->success();

        return redirect()->route('zones.index');
    }

    public function edit(Zone $zone)
    {
        $this->viewData['zone'] = $zone;
        $this->viewData['unAttachedLocations'] = Location::whereNull('zone_id')->get();

        return view('ddad.zones.edit', $this->viewData);
    }

    public function attachLocation(Zone $zone, Location $location)
    {
        $location->zone_id = $zone->id;
        $location->save();
        flash("Location added to the zone");

        return back();
    }

    public function detachLocation(Zone $zone, Location $location)
    {
        if($location->campaigns) {
            flash("You cannot delete this location. Because you have " . $location->campaigns->count() . " campaigns in this location.");
        }
        $location->zone_id = null;
        $location->save();
        flash("Location removed form the zone");

        return back();
    }

    public function update(Zone $zone, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'locations' => 'required|array|min:1',
            'previous_locations' => 'required|array|min:1'
        ]);
        $zone->update($request->all());

        foreach($request->locations as $id => $locationName) {
            if(in_array($id, $request->previous_locations)) {
                Location::where('id', $id)->update(['name' => $locationName]);
            } else {
                Location::create([
                    'name' => $locationName,
                    'zone_id' => $zone->id
                ]);
            }
        }

        flash('Zone updated successfully!')->success();
        return redirect()->route('zones.edit', $zone);
    }

    public function destroy(Zone $zone)
    {
        foreach($zone->locations as $location) {
            flash("You cannot delete this zone because you have " . $location->campaigns->count() . " campaigns in this $location->name.");

            $location->delete();
        }
        $zone->delete();
        flash('Zone deleted successfully!')->success();
        return redirect()->route('zones.index');
    }
}
