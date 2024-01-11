<?php

namespace App\Data;

class Tiger
{
    public Animal $animal;

    public function __construct(Animal $animal)
    {
        $this->animal = $animal;
    }

    public function behavior()
    {
        return $this->animal->eat() . " and " . $this->animal->sounds();
    }
}
