<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM Produit");
$produits = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Catalogue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Catalogue</h2>

<?php
if(isset($_GET['success'])) {
    echo "<p class='success'>Produit ajouté avec succès</p>";
}
?>

<a class="btn" href="ajouter-produit.php">Ajouter Produit</a>

<?php foreach($produits as $p): ?>
    <div class="card">
        <h3><?= $p['nom'] ?></h3>
        <p>Prix: <?= $p['prix'] ?> DH</p>
        <a class="btn" href="details.php?id=<?= $p['id'] ?>">Détails</a>
    </div>
<?php endforeach; ?>

</div>

</body>
</html>