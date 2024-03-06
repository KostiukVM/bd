<?php

namespace Models;

class Archer extends Hero
{
    protected string $name;
    public function getName():string
    {
        return $this->name;
    }

    public function __construct($name, $health, $armor, )
    {
        parent::__construct($name, $health, $armor);

    }
}