<?php

namespace App\Http\Controllers\Ddad;

use App\Ddad\Payment;
use App\Http\Controllers\Controller;
use App\Models\Ddad\Campaign;
use Illuminate\Support\Facades\Auth;

class AccountingController extends Controller
{
    public function index()
    {
        if(Auth::user()->isAdmin()) {
            $this->viewData['payments'] = Payment::where('paymentable_type', Campaign::class)->latest()->get();
        } else {
            $campaignsIds = Auth::user()->campaigns->pluck('id');
            $this->viewData['payments'] = Payment::where('paymentable_type', Campaign::class)->whereIn('paymentable_id', $campaignsIds)->latest()->get();
        }
        return view('ddad.accounting.index', $this->viewData);
    }
}
