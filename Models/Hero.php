<?php

namespace Models;


abstract class Hero implements HeroModel
{
    protected string $name;
    protected int $health;
    protected int $armor;
    protected ?Weapon $weapon = null;

    public function __construct(string $name, int $health, int $armor)
    {
        $this->name = $name;
        $this->health = $health;
        $this->armor = $armor;
    }

    abstract public function getName(): string;

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setWeapon($weapon): void
    {
        if ($weapon instanceof Weapon) {
            $this->weapon = $weapon;
        } else {
            throw new \InvalidArgumentException('Invalid weapon type.');
        }
    }

    public function getArmor(): int
    {
        return $this->armor;
    }

    public function getWeaponDamage(): ?int
    {
        return $this->weapon ? $this->weapon->getDamage() : null;
    }

    public function damageHealth(int $damage): void
    {
        $this->health -= $damage;
    }
}