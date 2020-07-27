<?php

namespace App\Http\Controllers\Ddad;
use App\Availability;
use App\HourlyPlaylist;
use App\Http\Controllers\Controller;
use App\Models\Audience;
use App\Models\CampaignPlay;
use App\Models\Ddad\Campaign;
use App\Models\Ddad\Shop;
use App\Models\Ddad\Zone;
use App\Models\Location;
use App\Models\PlayTime;
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
        if(Auth::user()->isAdmin()) {
            $this->viewData['zones'] = Zone::all();
            $this->viewData['locationIds'] = Location::all()->pluck('id')->toArray();
        } else {
            $temp = $this->viewData['campaigns']->pluck('locations')->map(function($l) {
                return $l->pluck('id')->toArray();
            })->toArray();

            $temp2 = $this->viewData['campaigns']->pluck('locations')->map(function($l) {
                return $l->pluck('zone_id')->toArray();
            })->toArray();

            $this->viewData['locationIds'] = array_unique(array_merge(...$temp));
            $this->viewData['zoneIds'] = array_unique(array_merge(...$temp2));

            $this->viewData['zones'] = Zone::whereIn('id', $this->viewData['zoneIds'])->get();
        }

        $this->viewData['zone'] = Zone::find($request->zone_id);
        $this->viewData['location'] = Location::find($request->location_id);
        $this->viewData['shop'] = Shop::find($request->shop_id);

        //Number of tv
        $this->viewData['campaign'] = Campaign::find($request->campaign_id);
        $this->viewData['campaignIds'] = $request->campaign_id ? [$request->campaign_id] : $this->viewData['campaigns']->pluck('id');
        $this->viewData['shopIds'] = $this->getShopIds($this->viewData['zone'], $this->viewData['location'], $this->viewData['shop']);
        $this->viewData['numberOfTv'] = $this->getNumberOfTv($this->viewData['shopIds']);

        //Line chart
        $this->viewData['rc'] = $rb = in_array($request->rb, ['hourly', 'weekly', 'daily', 'monthly']) ? $request->rb : 'hourly';
        $this->viewData['range'] = $this->getTimeRange($rb);
        $this->viewData['xaxix'] = $this->getXAxix($rb, $this->viewData['range'])->toArray();
        $this->viewData['yaxix'] = $this->getYAxix($this->viewData['range'], $this->viewData['shopIds']);


        //Calculate Total visit, Average vist, Forcasted total
        if($this->viewData['campaign']) {
            $this->viewData['totalVisit'] = $this->viewData['campaign']->totalVisit($this->viewData['shopIds']);
            $temp = $this->viewData['campaign']->ending_date->lt(now()) ? $this->viewData['campaign']->ending_date : now();
            $alreadyRunInDays = $this->viewData['campaign']->starting_date->diffInDays($temp) + 1;
            $this->viewData['averageVisit'] = (int)  ($this->viewData['totalVisit'] / $alreadyRunInDays);
            $this->viewData['forcastedTotal'] = $this->viewData['averageVisit'] * $this->viewData['campaign']->getRunningDay();
        }
        else {
            $this->viewData['totalVisit'] = $this->viewData['campaigns']->map(function($campaign) {
                return $campaign->totalVisit($this->viewData['shopIds']);
            })->sum();

            $alreadyRunInDays = $this->viewData['campaigns']->map(function($campaign) {
                $temp = $campaign->ending_date->lt(now()) ? $campaign->ending_date : now();
                $alreadyRunInDays = $campaign->starting_date->diffInDays($temp) + 1;
                return $alreadyRunInDays;
            })->sum();
            $this->viewData['averageVisit'] = $alreadyRunInDays ? (int)  ($this->viewData['totalVisit'] / $alreadyRunInDays) : 0;
            $totalCampaign = $this->viewData['campaigns']->count();

            $this->viewData['forcastedTotal'] = $totalCampaign ?
                $this->viewData['averageVisit'] * $this->viewData['campaigns']->map(function($campaign) {
                    return $campaign->getRunningDay();
                })->sum() / $totalCampaign
                : 0;
        }

        // Performance calculation
        if(($this->viewData['location'] || $this->viewData['zone'] || $this->viewData['shop']) && $this->viewData['shopIds']) {

            switch($rb) {
                case 'hourly':
                        $start = now()->startOfHour();
                        $end   = now()->endOfHour();
                    break;

                case 'monthly':
                    $start = now()->startOfMonth();
                    $end   = now()->endOfMonth();
                    break;

                case 'weekly':
                    $start = now()->startOfWeek();
                    $end   = now()->endOfWeek();
                    break;

                case 'daily':
                        $start = now()->startOfDay();
                        $end = now()->endOfDay();
                    break;
            }

            $totalAudienceQuery = Audience::where('created_at', '>=', $start)->where('created_at', '<=', $end);
            $performanceAudienceQuery = Audience::where('created_at', '>=', $start)->where('created_at', '<=', $end);
//            if($this->viewData['campaign']) {
//                $totalAudienceQuery->where('campaign_id', $this->viewData['campaign']->id);
//                $performanceAudienceQuery->where('campaign_id', $this->viewData['campaign']->id);
////                $cT = PlayTime::where('play_time', '>=', $start)->where('campaign_id', $this->id)->where('play_time', '<=', $end)->sum('duration');
////                $tt = PlayTime::where('play_time', '>=', $start)->where('play_time', '<=', $end)->sum('duration');
////
//            }
            $performanceAudienceQuery->whereIn('shop_id', $this->viewData['shopIds']);

            $performanceAudience = $performanceAudienceQuery->sum('number_of_audience');
            $totalAudience       = $totalAudienceQuery->sum('number_of_audience');

            $this->viewData['perform'] = (int) ($totalAudience ? $performanceAudience * 100 / $totalAudience : 0);
            $this->viewData['perform'] = min(100, max($this->viewData['perform'], 0));
            if($this->viewData['shop']) {
                $this->viewData['title'] =  $this->viewData['shop']->name;
            } elseif($this->viewData['location']){
                $this->viewData['title'] = $this->viewData['location']->name;
            }else {
                $this->viewData['title'] = $this->viewData['zone']->name;
            }
        } else {
            $this->viewData['perform'] = 0;
            $this->viewData['title'] = "Unavailable";
        }



        //Calculate performance
        $this->viewData['zonePerformances'] = $this->getZonePerformances();
        $this->viewData['locationPerformances'] = $this->getLocationPerformances();
        $this->viewData['shopPerformances'] = $this->getShopPerformances();

        return view('ddad.dashboard.index', $this->viewData);
    }


    private function getZonePerformances()
    {
        $temp = Zone::all()->map(function($zone){
            $shopIds = $zone->shops->pluck('id');
            return [
                'visits' => Audience::whereIn('shop_id', $shopIds)->where('created_at', ">", now()->startOfMonth())->where('created_at', '<', now()->endOfMonth())->sum('number_of_audience'),
                'zone'   => $zone
            ];
        });
        $tempMax = $temp->max('visits') ?: 1;

        return $temp->map(function($performance) use($tempMax) {
            $performance['percentage'] = intval(($performance['visits']/$tempMax) * 100);
            return $performance;
        })->sortByDesc('percentage');
    }


    private function getLocationPerformances()
    {
        $temp = Location::all()->map(function($location){
            $shopIds = $location->shops->pluck('id');
            return [
                'visits' => Audience::whereIn('shop_id', $shopIds)->where('created_at', ">", now()->startOfMonth())->where('created_at', '<', now()->endOfMonth())->sum('number_of_audience'),
                'location'   => $location
            ];
        });
        $tempMax = $temp->max('visits') ?: 1;

        return $temp->map(function($performance) use($tempMax) {
            $performance['percentage'] = intval(($performance['visits']/$tempMax) * 100);
            return $performance;
        })->sortByDesc('percentage');
    }


    private function getShopPerformances()
    {
        $temp = Shop::all()->map(function($shop){
            return [
                'visits' => Audience::where('shop_id', $shop->id)->where('created_at', ">", now()->startOfMonth())->where('created_at', '<', now()->endOfMonth())->sum('number_of_audience'),
                'shop'   => $shop
            ];
        });
        $tempMax = $temp->max('visits') ?: 1;

        return $temp->map(function($performance) use($tempMax) {
            $performance['percentage'] = intval(($performance['visits']/$tempMax) * 100);
            return $performance;
        })->sortByDesc('percentage');
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
