<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\AndroidBox;
use Illuminate\Http\Request;

class AndroidBoxController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'imei' => 'required',
            'label'=> 'required',
            'status'=> 'required|in:active,inactive',
        ]);
        $androidBox = AndroidBox::create($request->toArray());

        if($request->ajax()) {
            return [
                'message' => "Box successfully added.",
                'androidBox' => $androidBox,
            ];
        }

        flash('Box successfully added.')->success();
        return redirect()->route('android-boxes.index');
    }
}
