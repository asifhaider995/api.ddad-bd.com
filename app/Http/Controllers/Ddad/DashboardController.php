<?php

namespace App\Http\Controllers\Ddad;
use App\Availability;
use App\HourlyPlaylist;
use App\Http\Controllers\Controller;
use App\Models\Ddad\Campaign;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $this->viewData['availability'] = new Availability();
        $today = $request->date ? Carbon::createFromFormat('Y-m-d', $request->date) : now();
        $this->viewData['campaigns'] = Campaign::between($today->clone()->startOfDay(), $today->clone()->endOfDay())->where('status', 'approved')->orderBy('primary_queue')->get();

        return view('ddad.dashboard.index',$this->viewData);
    }


    public function playlist(Request $request, HourlyPlaylist $playlist)
    {
        $this->viewData['playlist'] = $playlist;
        return view('ddad.dashboard.playlist',$this->viewData);
    }

}
