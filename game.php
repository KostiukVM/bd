<?php

require __DIR__ . '/vendor/autoload.php';

use Models\Battle;
use Models\CreateHero;
use Models\Mage;
use Models\Warrior;
use Models\Weapon;



$sword = new Weapon(180);
$staff = new Weapon(170);
$bow = new Weapon(200);
$crossbow = new Weapon(230);
$gun = new Weapon(250);


$warriorWithSword = CreateHero::createHero('warrior');
$mageWithStaff = CreateHero::createHero('mage');


$mageWithStaff->setWeapon($staff);
$warriorWithSword->setWeapon($sword);

Battle::fight($warriorWithSword, $mageWithStaff);