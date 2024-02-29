<?php

namespace Models;

class Hero
{
    protected string $name;
    protected int|float $health;
    protected int|float $armor;
    protected Weapon $weapon;

    public function __construct($name, $health, $armor,Weapon $weapon)
    {
        $this->name = $name;
        $this->health = $health;
        $this->armor = $armor;
        $this->weapon =$weapon;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getHealth()
    {
        return $this->health;
    }

    public function getArmor()
    {
        return $this->armor;
    }
    public function getWeapon()
    {
        return $this->weapon->getDamage();
    }
    public function damageHealth($damageHealth)
    {
        $this->health -= $damageHealth;
    }
}