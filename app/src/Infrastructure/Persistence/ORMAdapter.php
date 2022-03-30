<?php

namespace App\Infrastructure\Persistence;

use App\Core\Port\Persistence;
use Doctrine\ORM\EntityManagerInterface;

class ORMAdapter implements Persistence
{
    private $entityManager;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getRepository($class): ORMAdapter
    {
        $this->repository = $this->entityManager->getRepository($class);
        return $this;
    }

    public function findAll(): ?array
    {
        return $this->repository->findAll();
    }
}