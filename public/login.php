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
    $user = $manager->login($_POST['email'], $_POST['password']);

    if ($user) {
        $_SESSION['user'] = $user; 
        header('Location: index.php');
        exit;
    }

    $error = "Email ou mot de passe incorrect";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Cubic Market</title>
    <style>
        :root {
            --bg-color: #1a1a1a;
            --card-bg: rgba(45, 45, 45, 0.9); 
            --primary-color: #55ff55;
            --text-color: #f1f1f1;
            --error-color: #ff5555;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                              url('../src/images/jungle-lake.webp');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .login-container {
            background-color: var(--card-bg);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.8);
            text-align: center;
            border-bottom: 5px solid var(--primary-color);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(8px);
        }

        h2 {
            font-size: 2rem;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px #000;
            margin-bottom: 1.5rem;
        }

        .error-box {
            background: rgba(255, 85, 85, 0.2);
            color: var(--error-color);
            padding: 10px;
            border-radius: 4px;
            border: 1px solid var(--error-color);
            margin-bottom: 1rem;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 1rem;
            background: #1a1a1a;
            border: 2px solid #444;
            border-radius: 4px;
            color: white;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: var(--primary-color);
            color: #000;
        }

        .footer-link {
            margin-top: 1.5rem;
            display: block;
            color: #aaa;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .footer-link:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Connexion</h2>

    <?php if (isset($error)): ?>
        <div class="error-box">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>

    <a href="register.php" class="footer-link">Pas encore de compte ? S'inscrire</a>
</div>

</body>
</html>