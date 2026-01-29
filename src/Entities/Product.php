<?php

namespace src\Entities;


class Product {

protected $nom;
protected $description;
protected $prix;
protected $image;

    public function __construct($nom , $description , $prix , $image) {
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->image = $image;
    }
}

?>
