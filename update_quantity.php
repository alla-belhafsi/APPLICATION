<?php
session_start();

if (isset($_POST['action']) && isset($_POST['product_index'])) {
    $product_index = $_POST['product_index'];

    if (isset($_SESSION['products'][$product_index])) {
        $product = $_SESSION['products'][$product_index];

        if ($_POST['action'] === 'ajouterQtt') {
            $product['qtt']++;
        } elseif ($_POST['action'] === 'diminuerQtt' && $product['qtt'] > 0) {
            $product['qtt']--;
        }

        $product['total'] = $product['price'] * $product['qtt'];
        $_SESSION['products'][$product_index] = $product; // Mettez à jour le produit dans la session
    }
}

header("Location: recap.php"); // Redirigez l'utilisateur vers la page de récapitulation après la mise à jour.
