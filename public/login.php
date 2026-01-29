<?php
session_start();

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/Core/Autoloader.php';

use Core\Autoloader;
use Managers\UserManager;

Autoloader::register();

if ($_POST) {
    $manager = new UserManager($pdo);
    $user = $manager->login($_POST['email'], $_POST['password']);

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit;
    }

    $error = "Email ou mot de passe incorrect";
}
?>

<h2>Connexion</h2>

<?= isset($error) ? htmlspecialchars($error) : '' ?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button>Connexion</button>
</form>
