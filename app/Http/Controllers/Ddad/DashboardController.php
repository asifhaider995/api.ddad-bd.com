<?php

namespace App\Http\Controllers\Ddad;
use App\Availability;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends Controller
{
    public function index()
    {
        $this->viewData['availability'] = new Availability();
        return view('ddad.dashboard.index',$this->viewData);
    }
}
