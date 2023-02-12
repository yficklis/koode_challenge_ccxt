<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class FetchBalanceModel extends Model
{
    use HasFactory;

    private function set_binance_credentials(): object
    {
        return new \ccxt\binance(
            array(
                'apiKey' => 'YOUR_PUBLIC_API_KEY',
                'secret' => 'YOUR_SECRET_PRIVATE_KEY',
            )
        );
    }

    public function get_fetch_balance(): array
    {
        date_default_timezone_set('UTC');
        $exchange = $this->set_binance_credentials();

        try {
            $balance = $exchange->fetch_balance();
            return $balance;
        } catch (\ccxt\NetworkError $e) {
            throw new InvalidArgumentException(json_encode(['403' => $e->getMessage()]));
        } catch (\ccxt\ExchangeError $e) {
            throw new InvalidArgumentException(json_encode(['404' => $e->getMessage()]));
        } catch (InvalidArgumentException $e) {
            throw new InvalidArgumentException(json_encode(['503' => "We are currently unable to get fetch balance, please try again!"]));
        }
    }
}
