<?php
   require_once('../autoload.php');

    session_start();
    setlocale(LC_TIME, 'fr');

    $date = date('Y-m-d a H:i:s');
    $panier = new \Controllers\Panier();
    $contenuPaniers = $panier->contenuPanier();
    $contenu =  $contenuPaniers;
    

    $numeroCommande = uniqid();

    $listeCommande = new \Controllers\Commandes();
    $produit_commande = new \Controllers\ProduitCommande();

    $total = 0;
    require_once('header.php');
?>
    <main>
        <section id="commande">
            <h1>Récapitulatif Commande</h1>
           
                <div id="grand-container">
                    <div class="commande-container">
                        <div class="commande-head">
                            <p>commande effectuer le <?=  $date  ?></p>
                            <p>Livraison :<?= $_SESSION['utilisateurs'][0]['adresse'] . ' ' . $_SESSION['utilisateurs'][0]['code_postale'] . ' ' . $_SESSION['utilisateurs'][0]['ville'] . ' ' . $_SESSION['utilisateurs'][0]['pays'] . ' '  . $_SESSION['utilisateurs'][0]['num']    ?></p>
                            <p>n° de commande:<?= $numeroCommande ?></p>
                        </div>
                        <?php   foreach($contenu as $cle => $value) :
                            var_dump($value);
                            $valeur = (float) $value['prix'];
                            $quantite = $value['quantite'];
                            $total += $quantite;
                        ?>
                        <div class="commandes">
                            <img src="<?= $value['image1']; ?>" alt="">
                            <h4><?= $value['nom'] ?></h4>
                            <h4>Quantite : <?= $value['quantite'] ?></h4>

                            <p>Prix :  <?= $value['prix'] ?><em> €</em></p>
                            <div>
                                <button type="submit">Voir le produit</button>
                                <a href="profil.php"><button>Mon Compte</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  $produit_commande->insererProduitCommande($numeroCommande, $value['id_produit']);?>
                <?php endforeach ?>
            <?php $listeCommande->insererCommandes($numeroCommande, $_SESSION['utilisateurs'][0]['id']); ?>
            <div>
                <p>Prix Total : <?= isset($_SESSION['prixTotal']) ? $_SESSION['prixTotal'] : '' ?><em> €</em></p>
            </div>

            <?php

                $liste = $listeCommande-> verifCommandeExiste($numeroCommande);
                
                if (!empty($liste)) {

                    $supprPanier = new \Controllers\Commandes();
                    $supprPanier->supprimerPanier($_SESSION['utilisateurs'][0]['id']);
                    unset($_SESSION['prixTotal']);
                    
                }
            ?>
            </section>
    </main>
    <?php require_once('footer.php'); ?>