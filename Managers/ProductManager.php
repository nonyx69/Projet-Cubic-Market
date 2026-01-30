<?php

namespace Managers;


class ProductManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addWeapon($name, $damage, $price)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO weapons (name, damage, price) VALUES (?, ?, ?)");
        $stmt->execute([$name, $damage, $price]);
    }

    public function addProduct($name, $defense, $price)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products (name, defense, price) VALUES (?, ?, ?)");
        $stmt->execute([$name, $defense, $price]);
    }

    public function addGrade($name, $level)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO grades (name, level) VALUES (?, ?)");
        $stmt->execute([$name, $level]);
    }
}
