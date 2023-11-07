<?php
session_start();
ob_start();
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
            echo "<p class='message'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']); // Supprimer le message de la session
        }
        ?>
        <br><a class='nbProduit' href='recap.php'>Nombre de produits : <?php echo countProductsInSession(); ?></a><br>
        <form action='traitement.php?action=add' method='POST'>
            <p class='form'>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p><br>
            <p class='form'>
                <label>
                    Prix du produit :
                    <input type="float" name="price" min="1">
                </label>
            </p><br>
            <p class='form'>
                <label>
                    Quantité désirée :
                    <input type="number" value="1" name="qtt" min="1"  >
                </label>
            </p><br>
            <div class='panier'>
                <div class='apanier'>
                    <input type="submit" name="submit" value="Ajouter au panier">
                </div>
                </form>
                <form action='traitement.php?action=clear' method='POST'>
                <div class='vpanier'>  
                    <input  type='submit' name='submit' value='Vider le panier'><br>
                </div>
            </div>
        </form>    
        <br>
    </body>
</html>
<?php

$content = ob_get_clean();

require_once "template.php";?>