<?php
session_start();
require_once('../Controllers/Commandes.php');
 require_once('header.php');
 $historique = new \Controllers\Commandes();
 $afficheHistorique = $historique->afficheHistorique($_SESSION['utilisateurs'][0]['id']); 
 ?>


    <section id="commande">
        <h1>Mes Commandes</h1>
        <?php foreach($afficheHistorique as $cle => $value){ var_dump($value)?>
            <div id="grand-container">
                <div class="commande-container">
                    <div class="commande-head">
                        <!-- <p>commande effectuer le  //$date </p> -->
                        <p>Livraison :<?= $value['adresse'] . ' ' . $value['code_postal'];    ?></p>
                        <p>n° de commande:<?= $value['numero']?></p>
                    </div>
                    <div class="commandes">
                        <img src="<?= $value['image1']; ?>" alt="">
                        <h4><?= $value['nom'] ?></h4>
                        <p>Prix :  <?= $value['prix_produit'] ?><em> €</em></p>
                        <div>
                            <button type="submit">Voir le produit</button>
                            <a href="profil.php"><button>Mon Compte</button></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>