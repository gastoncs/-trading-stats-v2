<?php

namespace App\Infrastructure\Persistence\ORM;

use App\Core\Port\Persistance;
use Doctrine\ORM\EntityManagerInterface;

class ORMAdapter implements Persistance
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAll(): ?array
    {
        $this->entityManager->getRepository(Song::class);
    }

}