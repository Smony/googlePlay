<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleApi extends Controller
{
    public $store;
    public $appId;
    public $token;
    public $password;

    public function __construct(Request $request)
    {
        $this->token = env('MARKET_TOKEN');
        $this->password = env('MARKET_PASSWORD');
        $this->store = env('MARKET_STORE');
        $this->appId = $request->input('id');
    }

    //
    public function index()
    {
        $result = $this->getInfoIdApp($this->appId);

        $result = (array)$result;

        if (count($result) > 1) {
            return view('info', ['result' => $result]);
        }

        return view('index');
    }

    protected function getInfoIdApp($appId): object
    {
        $store = $this->store;
        $username = $this->token;
        $password = $this->password;

        // Request URL
        $url = "https://api.appmonsta.com/v1/stores/$store/details/$appId.json?country=ALL";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_USERPWD => $username . ":" . $password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 500,
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response);
        return $result ?? [];
    }
}
