<?php
    session_start();
    require_once('function.php');
    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = array(); // Initialise la session 'products' comme un tableau
    }

    if(isset($_POST['submit'])) {

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_INT);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if($name && $price && $qtt && $price > 0 && $qtt > 0) {

            $product = [
                "name" => $name,
                "price" => $price, 
                "qtt" => $qtt,
                "total" => $price*$qtt 
            ];

            $_SESSION['products'][] = $product;
        }
    }

    header("Location:index.php"); // La condition sera alors vraie seulement si la requete POST transmet bien une clé "submit" au serveur.
