<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubic Market</title>
    <style>
        /* Design inspiré de l'univers Minecraft / Gaming */
        :root {
            --bg-color: #1a1a1a;
            --card-bg: #2d2d2d;
            --primary-color: #55ff55; /* Vert Minecraft */
            --text-color: #f1f1f1;
            --accent-color: #3fb33f;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: var(--card-bg);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            text-align: center;
            border-bottom: 5px solid var(--primary-color);
            min-width: 320px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--primary-color);
            text-shadow: 2px 2px #000;
        }

        .user-info {
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .role-badge {
            display: inline-block;
            background-color: #444;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            margin-top: 10px;
            color: #aaa;
        }

        .admin-badge { color: #ff5555; border: 1px solid #ff5555; }

        .nav-links a {
            text-decoration: none;
            color: var(--text-color);
            padding: 10px 20px;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            transition: all 0.3s ease;
            font-weight: bold;
            margin: 0 10px;
        }

        .nav-links a:hover {
            background-color: var(--primary-color);
            color: #000;
        }

        .logout-link {
            color: #ff5555 !important;
            border-color: #ff5555 !important;
        }

        .logout-link:hover {
            background-color: #ff5555 !important;
            color: white !important;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cubic Market</h1>

    <?php if (isset($_SESSION['user'])): ?>
        <div class="user-info">
            Bienvenue, <strong><?= htmlspecialchars($_SESSION['user']['pseudo']) ?></strong> 👋
            <br>
            <span class="role-badge <?= $_SESSION['user']['role'] === 'ROLE_ADMIN' ? 'admin-badge' : '' ?>">
                <?= htmlspecialchars($_SESSION['user']['role']) ?>
            </span>
        </div>
        
        <div class="nav-links">
            <a href="shop.php">Boutique</a>
            <a href="logout.php" class="logout-link">Déconnexion</a>
        </div>

    <?php else: ?>
        <div class="nav-links">
            <a href="login.php">Connexion</a>
            <a href="register.php">Inscription</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>