<?php
require 'config.php';

$erreur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $categorie = $_POST['categorie'];

    if (empty($nom) || empty($prix) || empty($description) || empty($categorie)) {
        $erreur = "Tous les champs sont obligatoires";
    } else {
        $stmt = $pdo->prepare("INSERT INTO Produit(nom, prix, description, categorie) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prix, $description, $categorie]);

        header("Location: catalogue.php?success=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Ajouter Produit</h2>

<?php if($erreur) echo "<p class='error'>$erreur</p>"; ?>

<form method="POST">
    <label>Nom</label>
    <input type="text" name="nom">

    <label>Prix</label>
    <input type="number" step="0.01" name="prix">

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Catégorie</label>
    <input type="text" name="categorie">

    <button type="submit">Ajouter</button>
</form>

</body>
</html>