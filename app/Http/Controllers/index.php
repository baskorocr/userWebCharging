<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

class index extends Controller
{

    public function index()
    {

        return view('home');
    }


}