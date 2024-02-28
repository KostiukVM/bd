<?php

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
class Weapon
{
    protected int|float $damage;

    public function __construct($damage)
    {
        $this->damage = $damage;
    }

    public function getDamage()
    {
        return $this->damage;
    }
}


class Warrior extends Hero
{

    public function __construct($name, $health, $armor, Weapon $weapon)
    {
        parent::__construct($name, $health, $armor, $weapon);

    }
}

class Mage extends Hero
{

    public function __construct($name, $health, $armor, Weapon $weapon)
    {
        parent::__construct($name, $health, $armor, $weapon);

    }
}

class Archer extends Hero
{

    public function __construct($name, $health, $armor, Weapon $weapon)
    {
        parent::__construct($name, $health, $armor, $weapon);

    }
}

class Battle
{
    protected int $health1hero;
    protected int $health2hero;

    public static function fight(Hero $hero1, Hero $hero2)
    {
        while ($hero1->getHealth() > 0 && $hero2->getHealth() > 0) {
            self::attack($hero1, $hero2);

        }

        if (($hero1->getHealth() <= 0)  && ($hero2->getHealth() > 0 )) {
            echo "Переможець: " . get_class($hero2). PHP_EOL;
        } elseif (($hero2->getHealth() <= 0)  && ($hero1->getHealth() > 0 )) {
            echo "Переможець: " . get_class($hero1) . PHP_EOL;
        } else {
            echo 'Нічия';
        }
    }


    public static function attack(Hero $hero1, Hero $hero2)
    {
        $damage_hero1 = $hero1->getWeapon() - $hero2->getArmor();
        $damage_hero2 = $hero2->getWeapon() - $hero1->getArmor();

        echo get_class($hero1) . ' атакує ' . get_class($hero2) . ' і наносить ' . $damage_hero1 . ' урона.' . PHP_EOL;
        echo get_class($hero2) . ' атакує ' . get_class($hero1) . ' і наносить ' . $damage_hero2 . ' урона.' . PHP_EOL;

        echo get_class($hero1) . ' має: ' . $hero1->getHealth() . ' здоров\'я ' . PHP_EOL;
        echo get_class($hero2) . ' має: ' . $hero2->getHealth() . ' здоров\'я ' . PHP_EOL;

        $hero1->damageHealth($damage_hero2);
        $hero2->damageHealth($damage_hero1);
    }
}


$sword = new Weapon(55);
$staff = new Weapon(50);
$bow = new Weapon(70);
$crossbow = new Weapon(85);
$gun = new Weapon(100);


$warrior = new Warrior("warrior", 1000, 50, $sword);
$mage = new Mage("mage", 1000, 50, $staff);

$winner = Battle::fight($warrior, $mage);