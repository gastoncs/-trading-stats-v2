<?php

namespace App\Core\Component\Performance\Application\Service;

interface SetupServiceInterface
{
    public function getAllSetup(): ?array;
    public function getTickerDetails(): ?array;
}