<?php

namespace App\Infrastructure\TradingData;

use App\Core\Port\TradingData;

class PoligonAdapter implements TradingData
{
    private $http;
    public function __construct(HttpInterface $http)
    {
        $this->http = $http;
    }

    /**
     * @return array
     */
    public function getTickerDetails(): array
    {
        $client = $this->http->getRequest('reference/tickers');
        return $client;
    }
}