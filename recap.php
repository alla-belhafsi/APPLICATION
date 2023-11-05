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
    <title>Récapitulatif des produits</title>
</head>
<button class="buttonLink" onclick="window.location.href='index.php'">MENU</button>
    <body class="formulaire">
    </div>
<body>
    <?php
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session...</p>";
    }
    else{
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']); // Supprimer le message de la session
        }
        echo "<p>Nombre de produits: ".countProductsInSession()."</p>"; 
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
                            "<a href='traitement.php?action=down-qty&id=$index'>-</a>",// le placement du bouton "-"
                            "<span>{$product['qtt']}</span>",
                            "<a href='traitement.php?action=up-qty&id=$index'>+</a>", // le placement du bouton "+"
                        "</div>",
                    "</td>",
                    "<td>" . number_format($product['total'] = $product["price"]*$product["qtt"], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                    "<td>", "<a href='traitement.php?action=delete&id=$index'>Supprimer le produit</a>",
                    "</td>",
                 "</tr>";
            
            $totalGeneral+= $product['total'];
        }
        echo "<tr>",
                "<td colspan=4>Total général : </td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
             "</tr>",
            "</tbody>",
            "</table>";
    } 
    ?>
</body>
<a href="traitement.php?action=clear">Vider le panier</a>
<a href="traitement.php?action=add">Ajouter au panier</a>
</html>