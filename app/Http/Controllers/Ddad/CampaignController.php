<?php

namespace App\Http\Controllers\Ddad;

use App\Ddad\Payment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ddad\CampaignRequest;
use App\Models\Ddad\Campaign;
use App\Models\Location;
use App\Models\User;
use App\Package;
use App\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function index()
    {
        if(Auth::user()->is_client)
            $this->viewData['campaigns'] = Auth::user()->campaigns;
        else
            $this->viewData['campaigns'] = Campaign::all();

        return view('ddad.campaigns.index', $this->viewData);
    }

    public function create()
    {
        $this->viewData['locations'] = Location::all();
        $this->viewData['clients'] = User::clients()->get();
        $this->viewData['packages'] = Package::all();
        $this->viewData['placements'] = Placement::all();

        return view('ddad.campaigns.create', $this->viewData);
    }


    public function calculate(Request $request)
    {
        if($request->package_name) {
            $package = new Package($request->package_name ?: '');
            $numberOfTv = Package::countNumberOfTV($request->locations ?: []);
            $durationMonth = abs((int)$request->duration_month);

            return [
                'total_price' => $package->calculatePrice($numberOfTv, $durationMonth),
                'number_of_tv' => $numberOfTv,
            ];
        }
        return [
            'total_price' => 0,
            'number_of_tv' => 0,
        ];
    }

    public function store(CampaignRequest $request)
    {
        $campaign = new Campaign($request->all());

        if(Auth::user()->isAdmin()) {
            $campaign->client_id = $request->client_id;
            $campaign->reviewer_id = Auth::id();
            $campaign->reviewer_note = $request->reviewer_note;
            $campaign->status = $request->status;
        } else {
            $campaign->client_id = Auth::id();
            $campaign->status = 'awaiting_for_approval';
        }
        $campaign->primary_path = $request->primary_video ? $request->primary_video->store("campaigns/{$campaign->client_id}/videos") : null;
        $campaign->secondary_path = $request->secondary_video ? $request->primary_video->store("campaigns/{$campaign->client_id}/videos") : null;
        $campaign->primary_queue = $request->primary_queue;
        $campaign->secondary_queue = $request->secondary_queue;
        $campaign->actual_price = $request->actual_price;
        $campaign->auto_renew = (boolean) $request->auto_renew;
        $campaign->save();
        $campaign->locations()->sync($request->locations);

        flash('Campaign successfully created ')->success();

        return redirect()->route('campaigns.index');
    }

    public function edit(Campaign $campaign)
    {
        $this->viewData['locations'] = Location::all();
        $this->viewData['campaign'] = $campaign;
        $this->viewData['clients'] = User::clients()->get();
        $this->viewData['packages'] = Package::all();
        $this->viewData['placements'] = Placement::all();

        return view('ddad.campaigns.edit', $this->viewData);
    }

    public function update(CampaignRequest $request, Campaign $campaign)
    {
        if(Auth::user()->isAdmin()) {
            $campaign->client_id = $request->client_id;
            $campaign->reviewer_id = Auth::id();
            $campaign->reviewer_note = $request->reviewer_note;
            $campaign->status = $request->status;

            $campaign->locations()->sync($request->locations);
            $campaign->starting_date = $request->starting_date;
            $campaign->duration_month = $request->duration_month;
            $campaign->package = $request->package;
            $campaign->placement = $request->placement;

            $campaign->primary_queue = $request->primary_queue;
            $campaign->secondary_queue = $request->secondary_queue;
            $campaign->actual_price = $request->actual_price;

        } else {
            $campaign->client_id = Auth::id();
            $campaign->status = 'awaiting_for_approval';
        }

        if($request->primary_video) {
            $campaign->primary_path = $request->primary_video->store("campaigns/{$campaign->client_id}/videos");
        }

        if($request->secondary_video) {
            $campaign->secondary_path = $request->secondary_video->store("campaigns/{$campaign->client_id}/videos");
        }

        $campaign->title = $request->title;
        $campaign->auto_renew = (boolean) $request->auto_renew;
        $campaign->save();

        flash('Campaign successfully updated')->success();
        return redirect()->route('campaigns.index');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        flash('Campaign deleted successfully!')->success();
        return redirect()->route('campaigns.index');
    }

    public function show(Campaign $campaign)
    {
        $this->viewData['campaign'] = $campaign;
        return view('ddad.campaigns.show', $this->viewData);
    }

    public function updateStatus(Campaign $campaign, $status) {
        $campaign->status = $status;
        $campaign->save();
        flash("Campaign successfully updated")->success();
        return redirect()->route('campaigns.index');
    }

    public function addPaymentReceived(Request $request, Campaign $campaign)
    {
        $request->validate([
            'payment_title' => "required",
            'amount' => "required|integer|confirmed|min:0|max:" . $campaign->dueAmount()
        ]);

        $payment = new Payment();
        $payment->amount = $request->amount;
        $payment->payment_title = $request->payment_title;
        $payment->user_id = auth()->id();
        $campaign->payments()->save($payment);
        flash("Payment successfully added.");

        return back();
    }
}
