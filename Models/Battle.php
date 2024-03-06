<?php

namespace Models;

class Battle
{
    protected int $health1hero;
    protected int $health2hero;

    public static function fight(Hero $hero1, Hero $hero2): void
    {
        while ($hero1->getHealth() > 0 && $hero2->getHealth() > 0) {
            self::attack($hero1, $hero2);

        }

        if (($hero1->getHealth() <= 0)  && ($hero2->getHealth() > 0 )) {
            echo "Переможець: " . $hero2::class . PHP_EOL;
        } elseif (($hero2->getHealth() <= 0)  && ($hero1->getHealth() > 0 )) {
            echo "Переможець: " . $hero1::class . PHP_EOL;
        } else {
            echo 'Нічия';
        }
    }

    public static function attack(Hero $hero1, Hero $hero2): void
    {
        $damage_hero1 = $hero1->getWeaponDamage() - $hero2->getArmor();
        $damage_hero2 = $hero2->getWeaponDamage() - $hero1->getArmor();

        $weapon1 = $hero1->getWeaponDamage() !== null ? $hero1->getWeaponDamage() : 'немає зброї';
        $weapon2 = $hero2->getWeaponDamage() !== null ? $hero2->getWeaponDamage() : 'немає зброї';

        echo get_class($hero1) . ' атакує ' . get_class($hero2) . ' і наносить ' . $damage_hero1 . ' урона. Зброя: ' . $weapon1 . PHP_EOL;
        echo get_class($hero2) . ' атакує ' . get_class($hero1) . ' і наносить ' . $damage_hero2 . ' урона. Зброя: ' . $weapon2 . PHP_EOL;

        echo get_class($hero1) . ' має: ' . $hero1->getHealth() . ' здоров\'я ' . PHP_EOL;
        echo get_class($hero2) . ' має: ' . $hero2->getHealth() . ' здоров\'я ' . PHP_EOL;

        $hero1->damageHealth($damage_hero2);
        $hero2->damageHealth($damage_hero1);
    }
}