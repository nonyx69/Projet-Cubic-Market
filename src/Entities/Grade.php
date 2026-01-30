<?php

namespace src\Entities;
use src\Entities\Product;

class Grade extends Product {

protected $rankName;

    public function __construct($nom , $description , $prix , $image , $rankName) {
        parent::__construct($nom , $description , $prix , $image,);
        $this->rankName = $rankName;
    }
}

?>
