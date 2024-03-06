<?php

namespace Models;

class Weapon
{
    protected $damage;

    public function __construct($damage)
    {
        $this->damage = $damage;
    }

    public function getDamage()
    {
        return $this->damage;
    }
}