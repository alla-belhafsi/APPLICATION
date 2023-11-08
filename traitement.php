<?php
session_start();
require_once('function.php');

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = array(); // Initialise la session 'products' comme un tableau
}


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            // Récupérez les valeurs de name, price, et qtt depuis les paramètres GET
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT);
            $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

            // Utilisez les mêmes conditions pour vérifier les valeurs
             //var_dump($name);
             //var_dump($price);
             //var_dump($qtt);die;
            if ($name && $price && $qtt && $price >0 && $qtt >0) {
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
        case "delete":
            // Code pour supprimer le produit
            if (isset($_GET["id"])) {
                $productIndex = $_GET["id"];
                if (isset($_SESSION["products"][$productIndex])) {
                    unset($_SESSION["products"][$productIndex]);
                
            // Message de succès
            $_SESSION['message'] = "Le produit a été supprimer avec succès.";}}
            header("Location: recap.php"); die;
            break;

        case "clear":
            // Code pour vider le panier
            unset($_SESSION['products']);
            
            // Message de succès
            $_SESSION['message'] = "Le panier a été vidé avec succès.";
            header("Location: recap.php"); die;
            break;

        case "up-qty":
            $_SESSION["products"][$_GET["id"]]["qtt"]++;

            // Message de succés
            $_SESSION['message'] = "La quantité a été augmenter avec succès.";
            header("Location: recap.php"); die;
            break;
            
        case "down-qty":
            if($_SESSION["products"][$_GET["id"]]["qtt"] >1){
                $_SESSION["products"][$_GET["id"]]["qtt"]--;}

                // Message de succés
                $_SESSION['message'] = "La quantité a été diminuer avec succès.";

            if($_SESSION["products"][$_GET["id"]]["qtt"] ==1){

                // Message d'averissement
                $_SESSION['message'] = "<b>La quantité minimale est atteinte.<br>Pour supprimer un produit, veuillez utiliser l'option 'Supprimer' dans la colonne Actions</b>";}
            header("Location: recap.php"); die;
            break;
        }
}
header("Location: index.php"); // Redirection vers la page d'index après traitement des actions.
