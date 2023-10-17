<?php

namespace App\Http\Controllers\UserControll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class getUser extends Controller
{
    public function getUser()
    {
        $token = Session::get('token');
        $client = new Client();
        if ($token != null) {
            try {
                $headers = [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json',

                ];

                $response = $client->get('http://127.0.0.1:8000/api/user', [
                    'headers' => $headers,
                ]);
                $data = $response->getBody()->getContents();

                return ['data' => $data];


            } catch (\Exception $e) {


            }
        }
    }


}