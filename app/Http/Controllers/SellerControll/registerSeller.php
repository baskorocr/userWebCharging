<?php

namespace App\Http\Controllers\SellerControll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\seller;

class registerSeller extends Controller
{
    public function index()
    {
        return view('seller.registerSeller');
    }

    public function register(Request $request)
    {

        $nomer = substr($request->noTelp, 4);
        $idUser = "usr" . (string) $nomer;
        $client = new Client();
        $data = [
            'id' => $idUser,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'noTelp' => $request->noTelp,
            'role' => $request->role,
            'password_confirmation' => $request->passwordConfirmation,
        ];



        try {

            $response = $client->post('http://127.0.0.1:8000/api/register', [
                'form_params' => $data,

            ]);
            $data = json_decode($response->getBody()->getContents(), true);

            if ($data['success']) {
                $this->RedirectLogin($request, $idUser);
            }


        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function RedirectLogin($request, $idUser)
    {
        $seller = seller::where('idUser', $idUser)->first();
        dd($seller);
    }
}