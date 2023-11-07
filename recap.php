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
    <title>Récapitulatif des produits</title>
</head>
<button class="buttonLink" onclick="window.location.href='index.php'">MENU</button><br><br>
    <body class="recap">
    <?php
    if (isset($_SESSION['message'])) {
        echo "<p class='message'>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']); // Supprimer le message de la session
    }
    ?>
    <?php
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p class='message'>Aucun produit en session...</p>";
    }
    else{
        if (isset($_SESSION['messaget'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']); // Supprimer le message de la session
        }
        echo "<br><p class='nbProduit'>Nombre de produits: ".countProductsInSession()."</p><br><br>"; 
        echo "<table class='tableRecap'>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                        "<th>Actions</th>",
                    "</tr>",
                "</thead>",
                "</tbody>";
        $totalGeneral = 0;
        
        foreach($_SESSION['products'] as $index => $product) {
            
            echo "<tr>",
                    "<td>" . $index . "</td>",
                    "<td>" . $product['name'] . "</td>",
                    "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                    "<td>",
                        "<div class='qtt' method='post'>",
                            "<a href='traitement.php?action=down-qty&id=$index'><b>-</b></a>",// le placement du bouton "-"
                            "<span>{$product['qtt']}</span>",
                            "<a href='traitement.php?action=up-qty&id=$index'><b>+</b></a>", // le placement du bouton "+"
                        "</div>",
                    "</td>",
                    "<td>" . number_format($product['total'] = $product["price"]*$product["qtt"], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                    "<td class='actions'>",
                        "<div class='poubelle'>", 
                            "<a href='traitement.php?action=delete&id=$index'><b>&#x1F5D1</b></a>",
                        "</div>",
                    "</td>",
                 "</tr>";
            
            $totalGeneral+= $product['total'];
        }
        echo "<tr>",
                "<td colspan=4>Total général : </td>",
                "<td colspan=2><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
             "</tr>",
            "</tbody>",
            "</table>";
    } 
    ?>
</body>
<form action='index.php' method='POST'>
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
</html>
<?php

$content = ob_get_clean();

require_once "template.php";?>