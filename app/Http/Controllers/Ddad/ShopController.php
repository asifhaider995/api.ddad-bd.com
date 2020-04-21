<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $this->viewData['shops'] = Shop::all();
        return view('ddad.shops.index', $this->viewData);
    }
}
