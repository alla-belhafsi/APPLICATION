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
    <button class="buttonLink" onclick="window.location.href='recap.php'">Récapitulatif</button>
    <body class="formulaire">
        <h1>Ajouter un produit</h1><br>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']); // Supprimer le message de la session
        }
        ?>
        <p>Nombre de produits: <?php echo countProductsInSession(); ?></p><br>
        <form action="traitement.php" method="get"> 
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p><br>
            <p>
                <label>
                    Prix du produit :
                    <input type="text" name="price">
                </label>
            </p><br>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1">
                </label>
            </p><br>
            <input type="submit" name="action" value="Ajouter au panier">
            <input type="submit" name="action" value="Vider le panier">
        </form>
    </body>
</html>