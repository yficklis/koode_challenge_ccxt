<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LoadMarketsModel;
use App\Models\FetchBalanceModel;

class CryptoCurrencyController extends Controller
{
    function GetFetchBalance()
    {
        return (new FetchBalanceModel())->get_fetch_balance();
    }

    function GetLoadMarkets(): string
    {
        return json_encode((new LoadMarketsModel())->get_load_markets());
    }

}
