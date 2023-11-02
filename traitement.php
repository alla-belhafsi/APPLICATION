<?php
session_start();
require_once('function.php');

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = array(); // Initialise la session 'products' comme un tableau
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "Ajouter au panier":
            // Récupérez les valeurs de name, price, et qtt depuis les paramètres GET
            $name = filter_input(INPUT_GET, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = filter_input(INPUT_GET, "price", FILTER_VALIDATE_FLOAT);
            $qtt = filter_input(INPUT_GET, "qtt", FILTER_VALIDATE_INT);

            // Utilisez les mêmes conditions pour vérifier les valeurs
            if ($name && $price && $qtt && $price > 0 && $qtt > 0) {
                $product = [
                    "name" => $name,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price * $qtt
                ];
                
                // Code pour ajouter au panier
                $_SESSION['products'][] = $product;
                
                // Message de succès
                $_SESSION['message'] = "Le produit a été ajouté avec succès.";
            } else {
                // Message d'erreur
                $_SESSION['message'] = "Veuillez vérifier les données du produit.";
            }
            break;
        case "Vider le panier":
            // Code pour vider le panier
            unset($_SESSION['products']);
            
            // Message de succès
            $_SESSION['message'] = "Le panier a été vidé avec succès.";
            
            break;
        }    
}
header("Location: index.php"); // Redirection vers la page d'index après traitement des actions.
