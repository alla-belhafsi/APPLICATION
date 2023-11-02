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
    <div><a href="index.php">MENU</a>
    </div>
<body>
    <?php
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session...</p>";
    }
    else{
        echo "<p>Nombre de produits: ".countProductsInSession()."</p>"; 
        echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
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
                    "<div class='quantity-container'>",
                    "<a href='traitement.php?action=down-qtt&index=$index' class='quantity-button'>&#45;</a>",
                    "<span class='quantity-number'>" . $product['qtt'] . "</span>",
                    "<a href='traitement.php?action=up-qtt&index=$index' class='quantity-button'>&#43;</a>",
                    "</div>",
                    "</td>",
                    "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
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
</html>