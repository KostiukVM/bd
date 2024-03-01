<?php

namespace Models;

abstract class Hero implements HeroModel
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

   abstract public function getName():string;

    public function getHealth(): float|int
    {
        return $this->health;
    }

    public function getArmor(): float|int
    {
        return $this->armor;
    }
    public function getWeapon(): float|int
    {
        return $this->weapon->getDamage();
    }
    public function damageHealth($damageHealth): void
    {
        $this->health -= $damageHealth;
    }
}