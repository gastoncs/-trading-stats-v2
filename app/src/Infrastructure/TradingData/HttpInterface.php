<?php

namespace App\Infrastructure\TradingData;

interface HttpInterface
{
    public function getRequest(string $endpoint):?array;
    public function postRequest(string $endpoint, array $postOptions):?array;
}