<?php
    session_start();
    require_once('../autoload.php');
    require_once('header.php');
    $historique = new \Controllers\Commandes();
    $afficheHistorique = $historique->afficheHistorique($_SESSION['utilisateurs'][0]['id']); 

    $produit_commande = new \Controllers\ProduitCommande();
    
 ?>


    <section id="commande">
        <h1>Mes Commandes</h1>
        <?php foreach($afficheHistorique as $cle => $value){?>
            <div id="grand-container">
                <div class="commande-container">
                    <div class="commande-head">
                        <!-- <p>commande effectuer le  //$date </p> -->
                        <p>Livraison :<?= $_SESSION['utilisateurs'][0]['adresse'] . ' ' . $_SESSION['utilisateurs'][0]['code_postale'];    ?></p>
                        <p>n° de commande:<?= $value['numero'] ?></p>
                    </div>
                    <?php $affiche_produit_commande = $produit_commande->select_produit_commande($value['numero']);
                    foreach($affiche_produit_commande as $clef => $valeur) {?>

                        <div class="commandes">
                            <img src="<?= $valeur['image1']; ?>" alt="">
                            <h4><?= $valeur['nom'] ?></h4>
                            <p>Prix :  <?= $valeur['prix'] ?><em> €</em></p>
                        <div>
                        <button type="submit">Voir le produit</button>
                        <a href="profil.php"><button>Mon Compte</button></a>
                    </div>
                </div><?php
                    }?>
                </div>
            </div>
        <?php } ?>
    </section>
</main>
<?php require_once('footer.php'); ?>