<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PaypalController extends Controller
{

    public function index(){
        return view('/time.checkout');
    }

    private function getAcessToken():string{
        $headers = [
            'Content-type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic ' . base64_encode(config('paypal.client_id') . ':' . config('paypal.client_secret'))
        ];

        $response = Http::withHeaders($headers)
            ->withBody('grant_type=client_credentials', 'application/x-www-form-urlencoded')
            ->post(config('paypal.base_url') . '/v1/oauth2/token');

        return json_decode($response->body())->access_token;
    }

    public function create(int $amount= 150):string {
        $id = uuid_create();

        $headers = [
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAcessToken(),
            'PayPal-Request-Id' => $id, 
        ];

        $body = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => $id,
                    "amount" => [
                        "currency_code" => "GBP",
                        "value" => number_format($amount, 2),
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders($headers)
            ->withBody(json_encode($body), 'application/json')
            ->post(config('paypal.base_url'). 'v2/checkout/orders');

        Session::put('request_id', $id);
        Session::put('order_id', json_decode($response->body())->id);

        return json_decode($response->body())->id;
    }

    public function complete() {
        $url = config('paypal.base_url') . 'v2/checkout/orders/' . Session::get('order_id') . '/capture';

        $headers = [
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAcessToken(),
        ];

        $response = Http::withHeaders($headers)
            -> post($url, null);
        
        return json_decode($response->body());
    }
}

