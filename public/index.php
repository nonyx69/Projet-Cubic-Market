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
            min-width: 350px;
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

        /* --- NOUVEAUX STYLES POUR LE NOM --- */
        .welcome-text {
            font-size: 1.2rem;
            color: #aaa;
            margin-bottom: 5px;
            display: block;
        }

        .user-name {
            font-size: 2.2rem;
            color: #fff;
            display: block;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 0 0 10px rgba(85, 255, 85, 0.5); /* Halo vert subtil */
            margin-bottom: 10px;
        }

        .role-badge {
            display: inline-block;
            background-color: #222;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            margin-top: 5px;
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
            transform: scale(1.05);
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
            <span class="welcome-text">Bienvenue,</span>
            <strong class="user-name"><?= htmlspecialchars($_SESSION['user']['pseudo']) ?></strong>
            
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