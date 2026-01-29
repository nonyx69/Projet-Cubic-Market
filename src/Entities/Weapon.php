<?php

namespace src\Entities;


class Weapons extends Product {

protected $damage

    public function __construct($nom , $description , $prix , $image) {
        parent::__construct($nom , $description , $prix , $image,);
        $this->damage = $damage;
    }
}

?>