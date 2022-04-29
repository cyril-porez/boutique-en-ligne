<?php


    require_once('../Controllers/barreRecherche.php');
    /*$bdd = new PDO("mysql:host=localhost;dbname=carnage;charset=utf8",'root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $produits = $bdd->prepare("SELECT nom from produits order by id desc");*/

    if (isset($_GET['recherche'])) {
        $recherche = $_GET['recherche'];
        $rechercheProduit = new Controllers\barreRecherche();
        $produit = $rechercheProduit->rechercheProduits($recherche);
        var_dump($produit);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>barre de recherche</title>
</head>
<body>
    <main>
        <form action="" method="get">
            <input type="search" name="recherche" placeholder="rechercher article">
            <input type="submit" value="rechercher">
        </form>
        <?php
            foreach($produit as $value) {?>
                <img src=<?= $value['image1']; ?> alt=""> <?php
                echo '<br>' . $value['nom']. '<br>';
                echo $value['prix'] . '<br>';?>
                <button>Ajouter au panier</button><br>
                <?php
            }
        ?>
    </main>
</body>
</html>