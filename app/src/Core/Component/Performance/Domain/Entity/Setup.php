<?php

namespace App\Core\Component\Performance\Domain\Entity;

class Setup
{
    private $id;
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
