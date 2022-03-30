<?php

namespace App\Core\Component\Performance\Application\Service;

use App\Core\Component\Performance\Application\Repository\SetupRepositoryInterface;

class SetupService implements SetupServiceInterface
{
    private $persistence;

    public function __construct(SetupRepositoryInterface $persistence)
    {
        $this->persistence = $persistence;
    }

    public function getAllSetup(): ?array
    {
        return $this->persistence->findAll();
    }
}