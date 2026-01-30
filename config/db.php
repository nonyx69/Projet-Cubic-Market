<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=cubic_market;charset=utf8", "root", "",);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION/*, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC*/);
} 
catch (PDOException $e) {
    die("Erreur BDD : " . $e->getMessage());
}
