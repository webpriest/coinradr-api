<?php

namespace App\Http\Controllers;

use \CoinMarketCapApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoinController extends Controller
{
    public function cryptos()
    {
        return CoinMarketCapApi::all_cryptos(['aux'=>'cmc_rank', 'limit'=>5000]);
    }
}
