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

    protected array $sayOnWin = ['Ура ', 'Єсс', 'Юхху'];
    protected array $sayOnLose = ['О ніі.. ', ' шкода( ', 'дуже прикро('];
    public function sayOnLose():string
    {
        $a = rand(0, (count($this->sayOnLose) - 1));
        return $this->sayOnLose[$a];
    }
    public function sayOnWin(): string
    {
        $b = rand(0, (count($this->sayOnWin) - 1));
        return $this->sayOnWin[$b];
    }

    protected array $sayOnAttack = [' на! ', ' помри ', ' ахахах ', ' боляче? '];
    public function sayOnAttack():string
    {
        $c = rand(0, (count($this->sayOnAttack) -1 ));
        return $this->sayOnAttack[$c];
    }
}