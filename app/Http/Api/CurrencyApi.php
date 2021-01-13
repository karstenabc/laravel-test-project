<?php

namespace App\Http\Api;

class CurrencyApi
{
    private $base = 'http://www.floatrates.com/';
    private $type = '.xml';
    private $header = [
        'Content-Type: application/xml'
    ];

    // Make a request to the endpoint
    private function makeRequest($url)
    {
        // Determine endpoint
        $request = curl_init($this->base . $url . $this->type);
        // Setup curl for making request
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, $this->header);
        $response = curl_exec($request);
        // Close request and return result converted to JSON
        curl_close($request);
        return json_encode(simplexml_load_string($response));
    }

    // API endpoint for getting the daily currency rate from one currency to another
    public function getDailyRate($sourceCurrency, $targetCurrency)
    {
        $conversions = json_decode(
            $this->makeRequest('daily/' . strtolower($sourceCurrency)),
            TRUE
        );

        // Find conversion for given target currency
        foreach ($conversions['item'] as $conversion)
        {
            if ($conversion['targetCurrency'] === strtoupper($targetCurrency)) {
                return json_encode($conversion);
            }
        }
    }
}
