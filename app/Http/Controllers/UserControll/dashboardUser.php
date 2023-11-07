<?php

namespace App\Http\Controllers\UserControll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DateTime;
use App\Http\Controllers\UserControll\getUser;

use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use LaravelJsonApi\Core\Facades\JsonApi;

class dashboardUser extends Controller
{

    public function index()
    {

        $token = Session::get('token');
        $myController = new getUser();
        $data = $myController->getUser();
        $data = json_decode($data['data'], true);

        $client = new Client();
        $currentMonth = Carbon::now()->month;
        $currentMonth = DateTime::createFromFormat('!m', $currentMonth);
        $currentMonth = $currentMonth->format('F');
        try {
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',

            ];
            $data = [
                'IdUser' => $data['id']
            ];


            $response = $client->post('http://127.0.0.1:8000/api/total', [
                'json' => $data,
                'headers' => $headers,
            ]);


            $data = json_decode($response->getBody()->getContents(), true);

            $total = $data['user']['0'];


            return view('user.dashboard', ['total' => $total, 'month' => $currentMonth]);


        } catch (\Exception $e) {
            dd($e);

        }


    }

    public function history()
    {
        $token = Session::get('token');
        $myController = new getUser();
        $data = $myController->getUser();
        $data = json_decode($data['data'], true);

        $client = new Client();
        try {
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',

            ];
            $data = [
                'IdUser' => $data['id']
            ];

            $response = $client->post('http://127.0.0.1:8000/api/history', [
                'json' => $data,
                'headers' => $headers,
            ]);


            $data = json_decode($response->getBody()->getContents(), true);


            $history = $data['data'];



            return view('user.history', ['history' => $history]);


        } catch (\Exception $e) {

            dd($e);
        }

    }

    public function postHistory(Request $request)
    {

        $token = Session::get('token');
        $myController = new getUser();
        $data = $myController->getUser();
        $data = json_decode($data['data'], true);

        $client = new Client();
        try {
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',

            ];
            $data = [
                'IdUser' => $data['id']
            ];


            $response = $client->post($request->link, [
                'json' => $data,
                'headers' => $headers,
            ]);


            $data = json_decode($response->getBody()->getContents(), true);


            $history = $data['data'];


            return view('user.history', ['history' => $history]);


        } catch (\Exception $e) {


        }
    }
}