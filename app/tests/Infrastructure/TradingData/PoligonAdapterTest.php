<?php

use App\Infrastructure\TradingData\PoligonAdapter;
use PHPUnit\Framework\TestCase;

class PoligonAdapterTest extends TestCase
{
    public function testGetTickerDetails()
    {
        $poligon = new PoligonAdapter();

        $response = $poligon->getTickerDetails();

        $this->assertIsString($response);
    }
}
