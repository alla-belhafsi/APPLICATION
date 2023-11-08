<?php
session_start();

require_once('function.php');
?>
<!DOCTYPE html>
<topheader>
    <button class="buttonLink" onclick="window.location.href='recap.php'">Récapitulatif</button>
    <body class="formulaire">
        <h1>Ajouter un produit</h1><br>
</topheader>
<?php ob_start();?>
<header>
    <a class='nbProduit' href='recap.php'>Nombre de produits : <?php echo countProductsInSession(); ?></a><br>
</header><br>
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
<?php

$content = ob_get_clean();

require_once "template.php";?>
            </div>
        </form>    
        <br>
    </body>
</html>
