<?php

require __DIR__ . '/vendor/autoload.php';

use Models\Battle;
use Models\Mage;
use Models\Warrior;
use Models\Weapon;



$sword = new Weapon(150);
$staff = new Weapon(170);
$bow = new Weapon(200);
$crossbow = new Weapon(230);
$gun = new Weapon(250);


$warrior = new Warrior("warrior", 1000, 10, $sword);
$mage = new Mage("mage", 1000, 10, $staff);

$winner = Battle::fight($warrior, $mage);
