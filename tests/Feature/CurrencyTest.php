<?php

namespace Tests\Feature;

use App\Http\Api\CurrencyApi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    /**
     * Test currency/australian-dollars page loads.
     *
     * @return void
     */
    public function testAustralianDollarsCurrencyPageLoads()
    {
        $response = $this->get('/currency/australian-dollars');
        $response->assertStatus(200);
    }

    /**
     * Test correct target currency conversion is.
     *
     * @return void
     */
    public function testCorrectJsonReturnedFromAustralianDollars()
    {
        $currencyApi = new CurrencyApi();
        $conversion = $currencyApi->getDailyRate('gbp', 'aud');
        $expectedTargetCurrency = 'AUD';
        $actualTargetCurrency = json_decode($conversion, TRUE)['targetCurrency'];
        $this->assertEquals($expectedTargetCurrency, $actualTargetCurrency, 'Target Currency: ' . $actualTargetCurrency . ' expected: ' . $expectedTargetCurrency);
    }
}
