<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class LoadMarketsModel extends Model
{
    use HasFactory;

    private function get_poloniex_load_markets(): array
    {
        try {
            $poloniex = new \ccxt\binance();
            return $poloniex->load_markets();
        } catch (\Throwable $th) {
            throw new InvalidArgumentException(json_encode(['503' => "We are currently unable to load Markets, please try again!"]));
        }
    }

    private function get_bittrex_load_markets(): array
    {
        try {
            $bittrex  = new \ccxt\bittrex(array('verbose' => false));
            return $bittrex->load_markets();
        } catch (\Throwable $th) {
            throw new InvalidArgumentException(json_encode(['503' => "We are currently unable to load Markets, please try again!"]));
        }
    }

    public function get_load_markets(): array
    {
        return array(
            'poloniex' => $this->get_poloniex_load_markets(),
            'bittrex' => $this->get_bittrex_load_markets()
        );
    }
}
