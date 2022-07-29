<?php

    require_once('../autoload.php');

    session_start();

    $idUtilisateur = $_SESSION['utilisateurs'][0]['id'];

    $afficheProduit = new \Controllers\Produits();
    $afficheProduitsFavoris = $afficheProduit->afficherProduitsFavoris($idUtilisateur);
?>

    <?php require_once('header.php'); ?>
    <main>
        <section id="favoris">
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
        </section>
    </main>
    <?php require_once('footer.php'); ?>