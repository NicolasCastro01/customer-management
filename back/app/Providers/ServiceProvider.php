<?php

namespace App\Providers;

abstract class ServiceProvider
{
    protected $container;

    public function __construct(array &$container)
    {
        $this->container = &$container;
    }

    abstract public function register();

    public function boot()
    {
        // Pode ser sobrescrito nos provedores concretos
    }
}
