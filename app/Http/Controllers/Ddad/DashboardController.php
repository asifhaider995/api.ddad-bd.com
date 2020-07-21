<?php

namespace App\Http\Controllers\Ddad;
use App\Availability;
use App\HourlyPlaylist;
use App\Http\Controllers\Controller;
use App\Models\Audience;
use App\Models\Ddad\Campaign;
use App\Models\Ddad\Shop;
use App\Models\Ddad\Zone;
use App\Models\Location;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function forcast(Request $request)
    {
        $this->viewData['availability'] = new Availability();
        $today = $request->date ? Carbon::createFromFormat('Y-m-d', $request->date) : now();
        $this->viewData['campaigns'] = Campaign::between($today->clone()->startOfDay(), $today->clone()->endOfDay())->where('status', 'approved')->orderBy('primary_queue')->get();

        return view('ddad.dashboard.forcast',$this->viewData);
    }


    public function playlist(Request $request, HourlyPlaylist $playlist)
    {
        $this->viewData['playlist'] = $playlist;
        return view('ddad.dashboard.playlist',$this->viewData);
    }


    public function index(Request $request)
    {
        $today = $request->date ? Carbon::createFromFormat('Y-m-d', $request->date) : now();
        $campaignQuery = Campaign::between($today->clone()->startOfDay(), $today->clone()->endOfDay())->where('status', 'approved')->orderBy('primary_queue');

//        if(!Auth::user()->isAdmin()) {
//            $campaignQuery->where('client_id', Auth::user()->id());
//        }

        $this->viewData['campaigns'] = $campaignQuery->get();
        $this->viewData['zones'] = Zone::all();
        $this->viewData['zone'] = Zone::find($request->zone_id);
        $this->viewData['location'] = Location::find($request->location_id);
        $this->viewData['shop'] = Shop::find($request->shop_id);


        //Line chart
        $rb = in_array($request->rb, ['hourly', 'weakly', 'daily', 'monthly']) ? $request->rb : 'hourly';
        $this->viewData['xaxix'] = $this->getXAxix($rb);
        $this->viewData['yaxix'] = $this->getYAxix($rb, $this->viewData['xaxix']);

        return view('ddad.dashboard.index', $this->viewData);
    }

    private function getYAxix($rb, $xaxix)
    {
        $results = [];
        switch($rb) {
            default: $df = '%h %p'; break;
            case 'daily': $df = '%d'; break;
            case 'monthly':$df = '%b'; break;
            case 'weakly':$df = '%a'; break;
        }

        foreach($xaxix as $xa) {
            $query =  Audience::where(\DB::raw("DATE_FORMAT(created_at, '$df')"), $xa);
            $results[] = $query->sum('number_of_audience');
        }

        return $results;
    }

    private function getXAxix($rb)
    {
        $results = [];

        switch($rb) {
            default:
                $range = CarbonPeriod::create('2018-01-01 07:00am', '1 hour', '2018-01-01 11:00pm');
                foreach($range as $month)
                    $results[] = $month->format('h A');
                break;

            case 'daily':
                $range = CarbonPeriod::create('2018-01-01', '1 day', '2018-01-31');
                foreach($range as $month)
                    $results[] = $month->format('d');
                break;
            case 'monthly':
                $range = CarbonPeriod::create('2018-01-01', '1 month', '2018-12-31');
                foreach($range as $month)
                    $results[] = $month->format('M');

                break;
            case 'weakly':
                $range = CarbonPeriod::create('2018-01-06', '1 day', '2018-01-12');
                foreach($range as $month)
                    $results[] = $month->format('D');
                break;
        }

        return $results;
    }
}
