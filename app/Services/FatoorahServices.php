<?php

namespace App\Services;

use App\Models\Setting;
use App\ModelTax;
use GuzzleHttp\Client;
use Illuminate\Database\Eloguent\Model;
use GuzzleHttp\Psr7\Request;

class FatoorahServices
{
    private $base_url;
    private $headers;
    private $request_client;

    public function __construct(Client $request_client)
    {
        $this->request_client = $request_client;

        $this->base_url = Setting::where('setting_key', 'payment_url')->first()->setting_value;
        $api_key = Setting::where('setting_key', 'api_key')->first()->setting_value;
        $this->headers = [
            "Content-Type" => 'application/json',
            "authorization" => 'Bearer ' . $api_key
        ];
    }

    public function buildRequest($url, $mothod, $data = [])
    {
        $request = new Request($mothod, $this->base_url . $url, $this->headers);
        if (!$data)
            return false;
        $response = $this->request_client->send($request, ['json' => $data]);
        if ($response->getStatusCode() != 200)
            return false;
        $response = json_decode($response->getBody(), true);
        return $response;
    }

    public function sendPayment($data)
    {
        $response  = $this->buildRequest('v2/SendPayment', 'POST', $data);
        return $response;
    }
    public function executePayment($data)
    {
        $response  = $this->buildRequest('v2/ExecutePayment', 'POST', $data);
        return $response;
    }
    public function getPaymentStatus($data)
    {
        $response  = $this->buildRequest('v2/getPaymentStatus', 'POST', $data);
        return $response;
    }
}
