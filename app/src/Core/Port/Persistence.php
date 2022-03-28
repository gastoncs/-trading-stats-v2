<?php

namespace App\Core\Port;

use App\Infrastructure\Persistence\ORMAdapter;

interface Persistence
{
    public function findAll(): ?array;
    public function getRepository($class): ORMAdapter;
}