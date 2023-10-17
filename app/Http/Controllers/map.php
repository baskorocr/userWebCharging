<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class map extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8000/api/map');
        $station = json_decode($response->getBody()->getContents(), true);

        return view('map', ['station' => $station['station']]);
    }
}