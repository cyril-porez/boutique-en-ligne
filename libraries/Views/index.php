<?php session_start();

    require_once('../autoload.php');

    $produit = new \Controllers\Produits();
    $afficheProduits = $produit->afficheProduitAccueil();
?>

<?php require_once('header.php'); ?>
    <main>
        <?php //var_dump($afficheProduits); ?>
        <section id="index">
            <section class="titre">
                <h2>BIENVENUE</h2>
            </section>
            <section class="img-presentation">
                <img src="images/entrer.webp" alt="">
            </section>

            <section class="titre">
                <h2>CARNAGE / GOD OF WAR</h2>
            </section>

            <section class="img-presentation">
                <img src="images/legendaire.webp" alt="">
            </section>

            <section class="titre">
                <h2>CARNAGE / ENTRE DANS L'ARENE</h2>
            </section>

            <section class="img-grid">
                <div class="parent">
                    <div class="div1"><img src="images/gant.jpg" alt=""></div>
                    <!-- <div class="div2"></div> -->
                    <div class="div3"><img src="images/atlete.jpg" alt=""></div>
                </div>
            </section>
            <section id="produits">
                <div id="grand-container">
                    <h1>NOS DERNIER ARTICLES</h1>
                    <div id="container">
                        <?php   foreach($afficheProduits as $afficheProduit) {?>
                            <div>
                                <img src=<?= $afficheProduit['image1'];?> alt="image carnage">
                                <?='<br>' . $afficheProduit['nom']. '<br>';?>
                                <?=$afficheProduit['prix'] . " €" . '<br>';?>
                                <div id="ajouter-panier">
                                    <form action="produit.php" method="get">
                                        <button name="produit" value=<?= $afficheProduit['id'] ?>>Voir Produit</button>
                                    </form>
                                </div>
                            </div><?php
                        }?>
                        </div>
                    </div>
            </section>
        </section>
    </main>
    <?php require_once('footer.php'); ?>