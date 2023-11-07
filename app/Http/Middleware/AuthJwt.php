<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class AuthJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
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
                $role = json_decode($response->getBody()->getContents());

                if ($role->role == "0") {

                    return redirect(url('user/dashboard'));

                } else if ($role->role == "1") {

                    return redirect(url('seller/dashboard'));
                }

            } catch (\Exception $e) {


                return $next($request);

            }
        } else {
            return $next($request);
        }


    }
}