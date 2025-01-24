<?php

namespace App\Entities;

abstract class Entity
{
    protected $identifier;

    protected function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function toEquals($entity)
    {
        return $this->getIdentifier() === $entity->getIdentifier();
    }
}
