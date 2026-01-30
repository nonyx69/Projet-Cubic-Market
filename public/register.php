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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Cubic Market</title>
    <style>
        :root {
            --bg-color: #1a1a1a;
            --card-bg: rgba(45, 45, 45, 0.85); 
            --primary-color: #55ff55;
            --text-color: #f1f1f1;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            
            background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                              url('../src/images/jungle-lake.webp');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .container {
            background-color: var(--card-bg);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.8);
            text-align: center;
            border-bottom: 5px solid var(--primary-color);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            color: var(--primary-color);
            text-shadow: 2px 2px #000;
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
            margin-top: 10px;
        }

        button:hover {
            background: var(--primary-color);
            color: #000;
            transform: scale(1.02);
        }

        .login-link {
            display: block;
            margin-top: 1.5rem;
            color: #aaa;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .login-link:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Inscription</h2>

    <form method="POST">
        <input type="text" name="pseudo" placeholder="Pseudo" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>

    <a href="login.php" class="login-link">Déjà un compte ? Se connecter</a>
</div>

</body>
</html>