<?php

    require_once('../Controllers/Produits.php');

    session_start();

    $idUtilisateur = $_SESSION['utilisateurs'][0]['id'];

    $afficheProduit = new \Controllers\Produits();
    $afficheProduitsFavoris = $afficheProduit->afficherProduitsFavoris($idUtilisateur);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/favoris.css">
    <title>Document</title>
</head>
<body>
    <?php require_once('header.php'); ?>
    <main>
        <!-- <div id="grand-container"> -->
            <?php require_once('navbarPanelUtilisateur.php'); ?>
            <div id="container">
            <h1>MES FAVORIS</h1>
                <?php
                    foreach ($afficheProduitsFavoris as $afficheProduits) {?>
                        <div>
                            <img src=<?= $afficheProduits['image1']; ?> alt="image carnage"> <?php
                            echo '<p class="article_content">' . $afficheProduits['nom']. '<br>';
                            echo $afficheProduits['prix'] . " €" . '</p>';?>
                            <form action="produit.php" method="get">
                                <button name="produit" value=<?= $afficheProduits['id'] ?>>Voir Produit</button>
                            </form>
                        </div><?php

                    }
                ?>
            </div>
        <!-- </div> -->
    </main>
    <?php require_once('footer.php'); ?>
</body>
</html>