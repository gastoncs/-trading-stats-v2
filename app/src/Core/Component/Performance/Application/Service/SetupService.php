<?php

namespace App\Core\Component\Performance\Application\Service;

use App\Core\Component\Performance\Application\Repository\SetupRepositoryInterface;
use App\Core\Port\TradingData;

class SetupService implements SetupServiceInterface
{
    private $persistence;
    private $tradingData;

    public function __construct(SetupRepositoryInterface $persistence, TradingData $tradingData)
    {
        $this->persistence = $persistence;
        $this->tradingData = $tradingData;
    }

    public function getTickerDetails(): ?array
    {
       return $this->tradingData->getTickerDetails();
    }

    public function getAllSetup(): ?array
    {
        return $this->persistence->findAll();
    }
}