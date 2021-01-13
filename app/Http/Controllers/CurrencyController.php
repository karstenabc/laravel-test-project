<?php

namespace App\Http\Controllers;

use App\Http\Api\CurrencyApi;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    // Handle currency url requests
    // This would be a switch case to handle the different accepted currencies
    public function currency($target)
    {
        if ($target == 'australian-dollars') {
            $rate = $this->getAustralianDollars('gbp');
        }
        return view('currency', [
            'rate' => $rate
        ]);
    }

    // Return the rate for currency to AUD
    public function getAustralianDollars($currency)
    {
        $currencyApi = new CurrencyApi();
        return $currencyApi->getDailyRate($currency, 'aud');
    }
}
