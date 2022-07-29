<?php
    require_once('../autoload.php');
    session_start();

    $id = $_GET['id'];
    $produits = new \Models\Categorie();
    $afficheProduits = $produits->choix_produit_par_categorie($id);

?>
    <?php require_once('header.php'); ?>
    <main>
        <section id="produits">
            <!-- <section id='filtre'>
                <section class='filtre_header'>
                    <h3>FILTRER PAR</h3>
                </section>
            </section> -->
            <div id="container">
                <?php
                    foreach($afficheProduits as $afficheProduit) {?>
                        <div>
                            <img src=<?= $afficheProduit['image1']; ?> alt="image carnage"> <?php
                            echo '<p class="article_content">' . $afficheProduit['nom']. '<br>';
                            echo $afficheProduit['prix'] . " €" . '</p>';?>
                            <form action="produit.php" method="get">
                                <button name="produit" value=<?= $afficheProduit['id'] ?>>Voir Produit</button>
                            </form>
                        </div><?php
                    }
                ?>
            </div>
        </section>
    </main>
    <?php require_once('footer.php'); ?>