<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class login extends Controller
{


    public function login()
    {

        return view('auth.login');


    }
    public function cek(Request $request)
    {

        try {
            $response = Http::post('http://127.0.0.1:8000/api/login', [
                'email' => $request->email,
                'password' => $request->password
            ]);

            $auth = $response->json();

            if ($auth['success'] == true) {
                session(['token' => $auth['token']]);
                if ($auth['user']['role'] == 0) {

                    return redirect('user/dashboard');
                }
                if ($auth['user']['role'] == 1) {

                    return redirect('seller/dashboard');
                }


            } else {
                redirect()->route('login');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }



    }
}