<?php

namespace Models;

interface HeroModel
{
    public function getName():string;

    public function getHealth();

    public function getArmor();
}