<?php
session_start();

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/Core/Autoloader.php';
require_once __DIR__ . '/../Managers/UserManager.php';

use Core\Autoloader;
use src\Managers\UserManager;

Autoloader::register();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // On utilise $db ou $pdo selon ton fichier config/db.php
    $manager = new UserManager($db); 
    
    // Inscription (Assure-toi que ta méthode register hache le mot de passe)
    $success = $manager->register(
        $_POST['pseudo'],
        $_POST['email'],
        $_POST['password']
    );

    if ($success) {
        header('Location: login.php?registered=1');
        exit;
    } else {
        $error = "Une erreur est survenue lors de l'inscription.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Cubic Market</title>
    <style>
        :root {
            --bg-color: #1a1a1a;
            --card-bg: #2d2d2d;
            --primary-color: #55ff55;
            --text-color: #f1f1f1;
            --input-bg: #1a1a1a;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: var(--card-bg);
            padding: 2.5rem;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            border-bottom: 5px solid var(--primary-color);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px #000;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 1rem;
            background-color: var(--input-bg);
            border: 2px solid #444;
            border-radius: 4px;
            color: white;
            box-sizing: border-box;
            transition: all 0.3s;
        }

        input:focus {
            border-color: var(--primary-color);
            outline: none;
            background-color: #222;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background-color: var(--primary-color);
            color: #000;
        }

        .footer-links {
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .footer-links a {
            color: #aaa;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .error-msg {
            color: #ff5555;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Inscription</h2>

    <?php if (isset($error)): ?>
        <div class="error-msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="pseudo" placeholder="Pseudo (ex: Steve)" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        
        <button type="submit">Créer mon compte</button>
    </form>

    <div class="footer-links">
        <a href="login.php">Déjà inscrit ? Se connecter</a>
    </div>
</div>

</body>
</html>