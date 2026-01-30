<?php
session_start();

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/Core/Autoloader.php';
require_once __DIR__ . '/../Managers/UserManager.php';

use Core\Autoloader;
use src\Managers\UserManager; // Ajusté selon ta structure de dossiers

Autoloader::register();

if ($_POST) {
    // On utilise $db ou $pdo selon le nom défini dans ton db.php
    $manager = new UserManager($db); 
    $user = $manager->login($_POST['email'], $_POST['password']);

    if ($user) {
        $_SESSION['user'] = [
            'pseudo' => $user->getPseudo(), // Utilisation de l'encapsulation de ta classe User
            'role' => $user->getRole()     // Récupération du rôle ROLE_USER ou ROLE_ADMIN
        ];
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
            --card-bg: #2d2d2d;
            --primary-color: #55ff55;
            --error-color: #ff5555;
            --text-color: #f1f1f1;
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

        .login-container {
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

        .error-msg {
            background-color: rgba(255, 85, 85, 0.2);
            color: var(--error-color);
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 1rem;
            border: 1px solid var(--error-color);
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 1rem;
            background-color: #1a1a1a;
            border: 2px solid #444;
            border-radius: 4px;
            color: white;
            box-sizing: border-box; /* Évite que l'input dépasse */
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: var(--primary-color);
            outline: none;
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
    </style>
</head>
<body>

<div class="login-container">
    <h2>Connexion</h2>

    <?php if (isset($error)): ?>
        <div class="error-msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>

    <div class="footer-links">
        <a href="register.php">Pas encore de compte ? S'inscrire</a>
    </div>
</div>

</body>
</html>