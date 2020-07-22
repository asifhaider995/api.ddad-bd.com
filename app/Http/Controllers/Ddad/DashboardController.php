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

        if(!Auth::user()->isAdmin()) {
            $campaignQuery->where('client_id', Auth::user()->id());
        }

        $this->viewData['campaigns'] = $campaignQuery->get()->filter(function($campaign) {
            return $campaign->status == 'approved';
        });

        $this->viewData['zones'] = Zone::all();
        $this->viewData['zone'] = Zone::find($request->zone_id);
        $this->viewData['location'] = Location::find($request->location_id);
        $this->viewData['shop'] = Shop::find($request->shop_id);

        //Number of tv
        $this->viewData['campaignIds'] = $request->campaign_id ? [$request->campaign_id] : $this->viewData['campaigns']->pluck('id');
        $this->viewData['shopIds'] = $this->getShopIds($this->viewData['zone'], $this->viewData['location'], $this->viewData['shop']);
        $this->viewData['numberOfTv'] = $this->getNumberOfTv($this->viewData['shopIds']);


        //Line chart
        $rb = in_array($request->rb, ['hourly', 'weekly', 'daily', 'monthly']) ? $request->rb : 'hourly';
        $this->viewData['range'] = $this->getTimeRange($rb);
        $this->viewData['xaxix'] = $this->getXAxix($rb, $this->viewData['range'])->toArray();
        $this->viewData['yaxix'] = $this->getYAxix($this->viewData['range'], $this->viewData['shopIds']);

        return view('ddad.dashboard.index', $this->viewData);
    }

    public function getShopIds($zone, $location, $shop) {
        if($shop) {
            return [ $shop->id ];
        } else if($location) {
            return $location->shops->pluck('id')->toArray();
        } else if($zone){
            return $zone->shops->pluck('id')->toArray();
        }
        return Shop::all()->pluck('id');
    }


    public function getNumberOfTv($shopIds)
    {
        $shops = Shop::whereIn('id', $shopIds)->get();
        $totalTv = $shops->filter(function($shop) {
            return $shop->device;
        })->count();
        $workingTv = $shops->filter(function($shop) {
            return $shop->device && $shop->device->android_imei && $shop->device->tv_serial && !$shop->device->tvAlerts();
        })->count();

        return [$totalTv, $workingTv];
    }

    private function getYAxix($timeRange, $shops, $campaigns = null)
    {
        $maximum = $timeRange->count() - 1;
        $results = [];

        for($i = 0; $i < $maximum; $i++) {
            $end = $timeRange[$i + 1];
            $query = Audience::where('created_at', '>',  $timeRange[$i])
                ->where('created_at', '<', $end->gt(now()) ? now() : $end);

            if(is_array($campaigns)) {
                $query->whereIn('campaign_id', $campaigns);
            }

            $query->whereIn('shop_id', $shops);

            $results[] = $query->sum('number_of_audience');

            if($end->gt(now())) {
                break;
            }
        };

        return $results;
    }

    public function getXAxix($rb, $timeRange)
    {
        switch($rb) {
            default:
                $result = $timeRange->map(function($start) {
                    return $start->format('h a');
                });
                $result->shift();
                $result->prepend(now()->startOfDay()->addHour(7)->format('H a'));
                break;
            case 'daily':
                $result = $timeRange->map(function($start) {
                    return $start->format('d D');
                });
                break;
            case 'monthly':
                $result = $timeRange->map(function($start) {
                    return $start->format('F');
                });
                break;
            case 'weekly':
                $i = 1;
                $result = $timeRange->map(function($start) use(&$i) {
                    return "Week " . ($i++);
                });
                break;
        }
        $result->pop();
        return $result;
    }

    private function getTimeRange($rb)
    {
        $results = [];

        switch($rb) {
            default:
                $results[] = now()->startOfDay();
                $start = now()->startOfDay()->addHour(8);
                $end = now()->startOfDay()->addHour(23);
                while($start->lt($end)) {
                    $results[] = $start->clone();
                    $start->addHour();
                }
                $results[] = now()->startOfDay()->addDay();
                break;

            case 'daily':
                $start = now()->startOfMonth();
                $end = now()->startOfMonth()->addMonth();
                while($start->lt($end)) {
                    $results[] = $start->clone();
                    $start->addDay();
                }
                $results[] = $end;
                break;

            case 'monthly':
                $start = now()->startOfYear();
                $end = now()->startOfYear()->addYear();
                while($start->lt($end)) {
                    $results[] = $start->clone();
                    $start->addMonth();
                }
                $results[] = $end;
                break;
            case 'weekly':
                $start = now()->startOfMonth();
                $end = now()->startOfMonth()->addMonth();
                while($start->lt($end)) {
                    $results[] = $start->clone();
                    $start->addWeek();
                }
                $results[] = $end;
                break;
        }

        return collect($results);
    }
}
