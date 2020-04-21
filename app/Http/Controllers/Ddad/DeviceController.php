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
}
