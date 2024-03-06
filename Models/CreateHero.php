<?php

namespace Models;

class CreateHero
{
    public static function createHero($type): Warrior|Mage|string|Archer
    {
        return match ($type) {
            'warrior' => new Warrior("Warrior", 1000, 10),
            'mage'    => new Mage   ('Mage', 800, 7),
            'archer'  => new Archer ('Archer', 900, 6),
            default   => "Unknown hero type",
        };
    }
}