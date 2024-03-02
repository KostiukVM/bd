<?php

namespace Models;

class Mage extends Hero
{
    protected string $name;
    public function getName():string
    {
        return $this->name;
    }
    public function __construct($name, $health, $armor, Weapon $weapon)
    {
        parent::__construct($name, $health, $armor, $weapon);

    }
}