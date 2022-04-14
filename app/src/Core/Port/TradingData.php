<?php

namespace App\Core\Port;

interface TradingData
{
    public function getTickerDetails(): array;
}