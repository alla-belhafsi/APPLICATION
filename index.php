<?php
session_start();
require_once('function.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Ajout produit</title>
    </head>
    <a href="recap.php">Récapitulatif</a>
    <body class="formulaire">
        <h1>Ajouter un produit</h1>
        <p>Nombre de produits: <?php echo countProductsInSession(); ?></p>
        <form action="traitement.php" method="post"> 
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="text" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
    </body>
</html>