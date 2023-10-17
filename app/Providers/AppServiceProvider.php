<?php

namespace App\Providers;



use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['nav', 'user.dashboard', 'user.map', 'user.history', 'seller.dashboard'], function ($view) {
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

                    $data = json_decode($response->getBody()->getContents());

                    View::share('user', $data);
                } catch (\Exception $e) {
                }


            }
        });

    }
}