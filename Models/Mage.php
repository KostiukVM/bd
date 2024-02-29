<?php

namespace Models;

class Mage extends Hero
{

    public function __construct($name, $health, $armor, Weapon $weapon)
    {
        parent::__construct($name, $health, $armor, $weapon);

    }
}