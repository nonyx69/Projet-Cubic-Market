<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubic Market</title>
    <style>
        :root {
            --bg-color: #1a1a1a;
            /* On garde une légère transparence pour voir l'image derrière la carte */
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
            
            /* --- CONFIGURATION DU BACKGROUND --- */
            /* Remplace l'URL par le chemin de ton image */
            background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                              url('../src/images/jungle-lake.webp');
            background-size: cover;       /* L'image prend tout l'espace */
            background-position: center;  /* Centrage de l'image */
            background-attachment: fixed; /* L'image ne bouge pas au scroll */
            background-repeat: no-repeat;
        }

        .container {
            background-color: var(--card-bg);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.8);
            text-align: center;
            border-bottom: 5px solid var(--primary-color);
            min-width: 350px;
            /* Effet flou derrière la carte (très moderne) */
            backdrop-filter: blur(8px); 
            -webkit-backdrop-filter: blur(8px);
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            color: var(--primary-color);
            text-shadow: 3px 3px #000;
        }

        .user-info { margin-bottom: 2rem; }

        .role-badge {
            display: inline-block;
            background-color: #222;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            margin-top: 10px;
            color: #ccc;
            border: 1px solid #444;
        }

        .admin-badge { color: #ff5555; border-color: #ff5555; }

        .nav-links a {
            text-decoration: none;
            color: var(--text-color);
            padding: 12px 25px;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            transition: all 0.3s ease;
            font-weight: bold;
            margin: 0 10px;
            display: inline-block;
        }

        .nav-links a:hover {
            background-color: var(--primary-color);
            color: #000;
            transform: scale(1.05); /* Petit effet de zoom au survol */
        }

        .logout-link { color: #ff5555 !important; border-color: #ff5555 !important; }
        .logout-link:hover { background-color: #ff5555 !important; color: white !important; }
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