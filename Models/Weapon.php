<?php

namespace Models;

class Weapon
{
    protected int|float $damage;

    public function __construct($damage)
    {
        $this->damage = $damage;
    }

    public function getDamage(): float|int
    {
        return $this->damage;
    }
}