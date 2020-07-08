<?php

namespace App\Http\Controllers\Ddad;

use App\Ddad\Payment;
use App\Http\Controllers\Controller;
use App\Models\Ddad\Campaign;

class AccountingController extends Controller
{
    public function index()
    {
        $this->viewData['payments'] = Payment::where('paymentable_type', Campaign::class)->latest()->get();
        return view('ddad.accounting.index', $this->viewData);
    }
}
