<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\TV;
use Illuminate\Http\Request;

class TVController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required',
            'size'=> 'required',
            'status'=> 'required|in:active,inactive',
        ]);
        $tv = TV::create($request->toArray());

        if($request->ajax()) {
            return [
                'message' => "TV successfully added.",
                'tv' => $tv,
            ];
        }

        flash('TV successfully added.')->success();
        return redirect()->route('tvs.index');
    }
}
