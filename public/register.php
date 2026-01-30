<?php
session_start();

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/Core/Autoloader.php';
require_once __DIR__ . '/../Managers/UserManager.php';

use Core\Autoloader;
use Managers\UserManager;

Autoloader::register();

if ($_POST) {
    $manager = new UserManager($pdo);
    $manager->register(
        $_POST['pseudo'],
        $_POST['email'],
        $_POST['password']
    );

    header('Location: login.php');
    exit;
}
?>

<h2>Inscription</h2>

<form method="POST">
    <input type="text" name="pseudo" placeholder="Pseudo" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button>S'inscrire</button>
</form>
