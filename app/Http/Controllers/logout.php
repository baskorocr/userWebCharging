<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class logout extends Controller
{
    public function logout()
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

                $response = $client->post('http://127.0.0.1:8000/api/logout', [
                    'headers' => $headers,
                ]);


                $data = json_decode($response->getBody()->getContents(), true);


                if ($data['success']) {
                    return redirect()->route('login');
                }



            } catch (\Exception $e) {
            }
        } else {
            return redirect()->route('login');
        }
    }
}