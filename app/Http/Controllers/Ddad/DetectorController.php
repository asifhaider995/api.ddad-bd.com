<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Detector;
use Illuminate\Http\Request;

class DetectorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'unique_id' => 'required',
            'label'=> 'required',
            'status'=> 'required|in:active,inactive',
        ]);
        $detector = Detector::create($request->toArray());

        if($request->ajax()) {
            return [
                'message' => "Detector successfully added.",
                'detector' => $detector
            ];
        }

        flash('Detector successfully added.')->success();
        return redirect()->route('detectors.index');
    }
}
