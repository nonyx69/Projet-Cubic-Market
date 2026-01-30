<?php
session_start();

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/Core/Autoloader.php';
require_once __DIR__ . '/../Managers/ProductManager.php';

use Core\Autoloader;
use Managers\ProductManager;

Autoloader::register();

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $type = $_POST['type'];
    $name = trim($_POST['name']);

    $manager = new ProductManager($pdo);

    if ($type === 'weapon') {
        $damage = (int) $_POST['damage'];
        $price  = (int) $_POST['price'];
        $manager->addWeapon($name, $damage, $price);
        $message = "Arme ajoutée avec succès";
    }

    if ($type === 'product') {
        $defense = (int) $_POST['defense'];
        $price   = (int) $_POST['price'];
        $manager->addProduct($name, $defense, $price);
        $message = "Armure ajoutée avec succès";
    }

    if ($type === 'grade') {
        $level = (int) $_POST['level'];
        $manager->addGrade($name, $level);
        $message = "Grade ajouté avec succès";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Shop Admin</title>
</head>
<body>

<h1>Shop – Ajout d’éléments</h1>

<?php if ($message): ?>
    <p style="color:green;"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<form method="POST">

    <label>Type :</label>
    <select name="type" required>
        <option value="weapon">Arme</option>
        <option value="product">Armure</option>
        <option value="grade">Grade</option>
    </select>
    <br><br>

    <input type="text" name="name" placeholder="Nom" required><br><br>

    <input type="number" name="price" placeholder="Prix"><br><br>

    <input type="number" name="damage" placeholder="Dégâts"><br><br>

    <input type="number" name="defense" placeholder="Défense"><br><br>

    <input type="number" name="level" placeholder="Niveau"><br><br>

    <button type="submit">Ajouter</button>

</form>

</body>
</html>
