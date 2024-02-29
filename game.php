<?php


use Models\Battle;
use Models\Mage;
use Models\Warrior;
use Models\Weapon;

require __DIR__ . '/vendor/autoload.php';

$sword = new Weapon(55);
$staff = new Weapon(50);
$bow = new Weapon(70);
$crossbow = new Weapon(85);
$gun = new Weapon(100);


$warrior = new Warrior("warrior", 1000, 50, $sword);
$mage = new Mage("mage", 1000, 50, $staff);

$winner = Battle::fight($warrior, $mage);