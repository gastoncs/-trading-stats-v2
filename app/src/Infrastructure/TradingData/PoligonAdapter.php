<?php

namespace App\Infrastructure\TradingData;

use PolygonIO\Rest\Rest;

class PoligonAdapter
{
    private $key;
    public function __construct()
    {
        $this->key = 'SwoI2Jze5X8bPQveMn29TdQ4ccSkywuc';
    }

    /**
     * @return string|null
     */
    public function getTickerDetails(): ?string
    {
         return $this->getCurl();
    }

    /**
     * @return string|null
     */
    private function getCurl(): ?string
    {
        // kvstore API url
        $url = 'https://api.polygon.io/v3/reference/tickers/AAPL';
        // Initializes a new cURL session
        $curl = curl_init($url);
        // Set the CURLOPT_RETURNTRANSFER option to true
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Set the CURLOPT_POST option to true for POST request
        curl_setopt($curl, CURLOPT_POST, true);
        // Set the request data as JSON using json_encode function
        //curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
        // Set custom headers for RapidAPI Auth and Content-Type header
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "apiKey: $this->key",
            'Content-Type: application/json'
        ]);
        // Execute cURL request with all previous settings
        $response = curl_exec($curl);
        // Close cURL session
        curl_close($curl);

        return $response . PHP_EOL;
    }
}