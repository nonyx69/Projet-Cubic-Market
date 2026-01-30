<?php

namespace src\Entities;
use src\Entities\Product;

class Weapons extends Product {

protected $damage;

    public function __construct($nom , $description , $prix , $image , $damage) {
        parent::__construct($nom , $description , $prix , $image,);
        $this->damage = $damage;
    }
}

?>