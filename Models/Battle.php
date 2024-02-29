<?php

namespace Models;

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