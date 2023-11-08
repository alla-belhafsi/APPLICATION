<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Ajout produit</title>
</head>
<header>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='message'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']); // Supprimer le message de la session
        }
        ?>
</header>
<body>
    <div>
        <?= $content ?>
    </div>
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
</body>
</html>