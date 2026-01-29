<?php

namespace src\Entities;


class Grade extends Product {

protected $rankName

    public function __construct($nom , $description , $prix , $image) {
        parent::__construct($nom , $description , $prix , $image,);
        $this->rankName = $rankName;
    }
}

?>
