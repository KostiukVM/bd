<?php

class Hero
{
    protected string $name;
    protected int|float $health;
    protected int|float $armor;
    protected string $weapon;

    public function __construct($name, $health, $armor, $weapon)
    {
        $this->name = $name;
        $this->health = $health;
        $this->armor = $armor;
        $this->weapon = $weapon;
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
        return $this->weapon;
    }
    public function damage($damage)
    {
        $this->health -=$damage;
    }
}
class Weapon
{
    const SWORD_DAMAGE      = 55;           // меч
    const STAFF_DAMAGE      = 50;           // посох
    const BOW_DAMAGE        = 70;           // лук
    const CROSSBOW_DAMAGE   = 85;           // арбалет
    const GUN_DAMAGE        = 100;          // пістолет
}


class Warrior extends Hero
{
    const DEFAULT_HEALTH = 500;
    const DEFAULT_ARMOR = 20;
    const DEFAULT_WEAPON = Weapon::SWORD_DAMAGE;
    public function __construct()
    {

        parent::__construct('Warrior',self::DEFAULT_HEALTH, self::DEFAULT_ARMOR, self::DEFAULT_WEAPON);
    }
}

class Mage extends Hero
{
    const DEFAULT_HEALTH = 400;
    const DEFAULT_ARMOR = 15;
    const DEFAULT_WEAPON = Weapon::STAFF_DAMAGE;
    public function __construct()
    {

        parent::__construct('Mage',self::DEFAULT_HEALTH, self::DEFAULT_ARMOR, self::DEFAULT_WEAPON);
    }
}

class Archer extends Hero
{
    const DEFAULT_HEALTH = 350;
    const DEFAULT_ARMOR = 10;
    const DEFAULT_WEAPON = Weapon::BOW_DAMAGE;
    public function __construct()
    {

        parent::__construct('Archer',self::DEFAULT_HEALTH, self::DEFAULT_ARMOR, self::DEFAULT_WEAPON);
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

        $health1hero = $hero1->getHealth() - $damage_hero2;
        $health2hero = $hero2->getHealth() - $damage_hero1;

        echo get_class($hero1) . ' атакує ' . get_class($hero2) . ' і наносить ' . $damage_hero1 . ' урона.' . PHP_EOL;
        echo get_class($hero2) . ' атакує ' . get_class($hero1) . ' і наносить ' . $damage_hero2 . ' урона.' . PHP_EOL;

        echo get_class($hero1) . ' має: ' . $health1hero . ' здоров\'я ' . PHP_EOL;
        echo get_class($hero2) . ' має: ' . $health2hero . ' здоров\'я ' . PHP_EOL;

        $hero1->damage($damage_hero2);
        $hero2->damage($damage_hero1);
    }
}

$warrior = new Warrior();
$mage = new Mage();
$archer = new Archer();


$winner = Battle::fight($warrior, $mage);