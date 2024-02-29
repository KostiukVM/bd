<?php

namespace Models;

class Archer extends Hero
{

    public function __construct($name, $health, $armor, Weapon $weapon)
    {
        parent::__construct($name, $health, $armor, $weapon);

    }
}