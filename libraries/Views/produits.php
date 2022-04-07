<?php
    //require_once('header.php');
    require_once('../Models/Produits.php');
    require_once('../Models/SousCategorie.php');
    require_once('../Models/Categorie.php');
    
    $id = $_GET['id'];
    
    $sous_categorie = new \Models\SousCategorie;
    $affiche_sous_categories = $sous_categorie->choix_produit_sous_categorie($id);
    
    

    var_dump($affiche_sous_categories);
    
   // echo $id;
?>

<html>
    <body>
        <header>

        </header>
        <main>
            <?php
                foreach($affiche_sous_categories as $affiche_sous_categorie) {?>
                    <img src=<?= $affiche_sous_categorie['image1']; ?> alt="image carnage"> <?php
                    echo '<br>' . $affiche_sous_categorie['nom']. '<br>';
                    echo $affiche_sous_categorie['prix'] . " €" . '<br>';?>
                    <form action="produit.php" method="get">
                        <button name="produit" value=<?= $affiche_sous_categorie['id'] ?>>Voir Produit</button>
                    </form><?php

                }
                ?>
        </main>
        <footer>

        </footer>
    </body>   
</html>