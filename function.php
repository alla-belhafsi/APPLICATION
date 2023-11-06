<?php
function countProductsInSession() {
    $totalQuantity = 0;

    if (isset($_SESSION['products']) && is_array($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $product) {
            if (isset($product["qtt"]) && is_numeric($product["qtt"])) {
                $totalQuantity += $product["qtt"];
            }
        }
    }

    return $totalQuantity;
}


