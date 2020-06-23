<?php

namespace App\Http\Controllers\Ddad;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends Controller
{
    public function index()
    {
        return view('ddad.dashboard.index');
    }
}
