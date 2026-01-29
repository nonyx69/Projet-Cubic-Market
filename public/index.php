<?php
session_start();
?>

<h1>Cubic Market</h1>

<?php if (isset($_SESSION['user'])): ?>
    Bienvenue <?= htmlspecialchars($_SESSION['user']['pseudo']) ?> 👋
    <br>
    Rôle : <?= htmlspecialchars($_SESSION['user']['role']) ?>
    <br>
    <a href="logout.php">Déconnexion</a>
<?php else: ?>
    <a href="login.php">Connexion</a> |
    <a href="register.php">Inscription</a>
<?php endif; ?>
