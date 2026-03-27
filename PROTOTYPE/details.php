<?php
require 'config.php';

if(!isset($_GET['id'])) {
    die("Produit non trouvé");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM Produit WHERE id = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch();

if(!$produit) {
    die("Produit introuvable");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Détails</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Détails Produit</h2>

<div class="card">
    <h3><?= $produit['nom'] ?></h3>
    <p>Prix: <?= $produit['prix'] ?> DH</p>
    <p><?= $produit['description'] ?></p>
    <p>Catégorie: <?= $produit['categorie'] ?></p>

    <a class="btn" href="catalogue.php">Retour</a>
</div>

</div>

</body>
</html>