<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $token = session::get('token');
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
                $temp = (string) $role->role;

                if ($temp == $roles) {

                    return $next($request);
                } else {
                    return redirect(url('error'));
                }



            } catch (\Exception $e) {



                return redirect(url('/login'));

            }
        } else {

            return redirect(url('/login'));
        }

    }
}