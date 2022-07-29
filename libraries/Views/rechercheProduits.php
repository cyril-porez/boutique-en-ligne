<?php

require_once('../autoload.php');

session_start();

if (isset($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
    $rechercheProduit = new Controllers\barreRecherche();
    $produit = $rechercheProduit->rechercheProduits($recherche);
    // var_dump($produit);
}
?>
<?php require_once('header.php'); ?>
    <main>
        <section id="produits">
            <div id="container">
                <?php foreach ($produit as $produits) {?>
                <div>
                    <img src=<?= $produits['image1'];?> alt="image carnage">
                    <?='<br>' . $produits['nom']. '<br>';?>
                    <?=$produits['prix'] . " €" . '<br>';?>
                    <div id="ajouter-panier">
                    <form action="produit.php" method="get">
                        <button name="produit" value=<?= $produits['id'] ?>>Voir Produit</button>
                    </form>
                </div>
                </div><?php
                } ?>
            </div>
        </section>
    </main>
    <?php require_once('footer.php'); ?>