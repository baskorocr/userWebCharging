<?php

namespace App\Http\Controllers\SellerControll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SellerControll\getSeller;

class dashboardSeller extends Controller
{
    public function index()
    {
        $seller = new getSeller();
        $seller = $seller->getSeller();
        $seller = json_decode($seller['data'], true);


        return view('seller.dashboard', ['seller' => $seller['seller']]);
    }


}