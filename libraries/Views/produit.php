<?php

    session_start();

    require_once('../Models/Produits.php');
    require_once('../Controllers/Produits.php');
    require_once('../Controllers/Utilisateurs.php');
    require_once('../Controllers/Stock.php');
    require_once('../Controllers/Commentaires.php');

    $id_produit = $_GET['produit'];
    //Modifier et appeler le controlleur
    $produits = new \Controllers\Produits();
    $produit = $produits->selection_produits($id_produit);
    
    
    $jaimeDeteste = new \Controllers\Produits();
    
    $produitFavoris = new \Controllers\Utilisateurs();
    if(isset($_SESSION['utilisateurs'])){
        $idUtilisateur = $_SESSION['utilisateurs'][0]['id'];
        $produitFavoris->mettreProduitFavoris($idUtilisateur, $id_produit);
        $produitFavoris->ajoutPanier($idUtilisateur, $id_produit, isset($_Post['quantite']), isset($_POST['ajout']));
    }
    $etatAimeDeteste = new \Models\AimeDeteste();
    $etatJaime = $etatAimeDeteste->etat_du_jaime($id_produit);
    $etatDeteste = $etatAimeDeteste->etat_du_deteste($id_produit);

    $verifQuantite = new \Controllers\Stock();
    $quantiteKimonos = $verifQuantite->verifStockQuantiteKimono($id_produit);
    $quantite_vetements = $verifQuantite->verif_stock_quantite_vetement($id_produit);
    $quantite_gants = $verifQuantite->verif_stock_quantite_gant($id_produit);

    if(isset($_POST["jaime"])) {
        $jaimeDeteste->jaime($idProduit);
    }
    else if (isset($_POST["deteste"])) {
        $jaimeDeteste->deteste($idProduit);
    }

    $chaine =  $produit[0]['nom'];
    $gant   = 'Gant';
    $kimono = 'Kimono';

    $commentaire = new \Controllers\Commentaires();
    $affiches = $commentaire->AfficheCommentaire($id_produit);

    if (!empty($_POST['commentaire'])) {
        $commentaire = new \Controllers\Commentaires();
        $commentaire->posterCommentaire($_POST['commentaire'], $idUtilisateur, $idProduit);
        header("Refresh: 0");
    }

    if (!empty($_POST['reponse'])) {
        $reponseCom = new \Controllers\Commentaires();
        $reponseCom->reponseCommentaire($_POST['reponse'], $_POST['idReponse'], $idUtilisateur, $idProduit);
       // header("Refresh: 0");
       // break;
    }
    // var_dump($_SESSION);
?>
    <?php require_once('header.php'); ?>
        <main>
            <section id="produit">
                <div id="container-produit">
                    <div id="container-img">
                        <img src=<?= $produit[0]['image1'] ?> alt="">
                    </div>
                    <div id="container-description">

                        <span><h3><?= $produit[0]['nom'] . '<br>'; ?></h3></span>
                        <span><h2><?= $produit[0]['prix'] . ' €' . '<br>'; ?></h2></span>
                        <?php if(!empty($_SESSION)){ ?>
                                <form action="" method="post">
                                    <button type="submit" name="jaime"><?= $etatJaime[0]['j_aime'].' ' ?><i class="fa-solid fa-thumbs-up"></i></button>
                                    <button type="submit" name="deteste"><?= $etatDeteste[0]['deteste'].' ' ?><i class="fa-solid fa-thumbs-down"></i></button>
                                    <button type="submit" name="favoris"><i class="fa-solid fa-bookmark"></i></button>
                                </form>
                        <?php } ?>
                        <div id="taille">
                            <?php
                                $verifieGants = strripos($chaine,$gant);
                                $verifieKimono = strripos($chaine, $kimono);

                                if( $verifieGants === 0 || $verifieGants === true ) {?>
                                    <form action="" method="post">
                                        <div>
                                            <select name="taille_produits" id="">
                                                <option value="taille_kimono">choisissez une taille de gant</option>
                                                <?php
                                                    foreach($quantite_gants as $quantite_gant => $value) {
                                                        $nbrStock = $value['stock_gant'];
                                                        if ($nbrStock > 0) {
                                                            echo "<option value=" .  $value['id'] . ">" . $value["nom"] . "</option>";
                                                        }
                                                    }
                                                ?>
                                            <?php if(!empty($_SESSION)){ ?>
                                            <form action="" method="post">
                                                <span>
                                                    <input type="number" name="quantité" min = 0 id="input-number" value='0'>
                                                    <button name="ajout" id="ajout-panier">AJOUTER AU PANIER</button>
                                                </span>
                                                <!-- <button name="ajout" id="ajout-panier">AJOUTER AU PANIER</button> -->
                                            </form>
                                            <?php } ?>
                                            </select>
                                        </div>

                                    </form>
                            <?php }
                                elseif($verifieKimono === 0 || $verifieKimono === true) {?>
                                    <form action="" method="post">
                                        <div>
                                            <select name="taille_produits" id="">
                                                <option value="taille_kimono">choisissez une taille de Kimono</option>
                                                <?php
                                                    echo "test";
                                                    foreach($quantiteKimonos as $quantiteKimono => $value) {
                                                        echo $value;
                                                        $nbrStock = $value['stock_kimono'];
                                                        echo $nbrStock;
                                                        if ($nbrStock > 0) {
                                                            echo "<option value=" .  $value['id'] . ">" . $value["nom"] . "</option>";
                                                        }
                                                    }
                                                ?>
                                            <?php if(!empty($_SESSION)) { ?>
                                            <form action="" method="post">
                                                <span>
                                                    <input type="number" name="quantité" min = 0 id="input-number" value='0'>
                                                    <button name="ajout" id="ajout-panier">AJOUTER AU PANIER</button>
                                                </span>
                                                <!-- <button name="ajout" id="ajout-panier">AJOUTER AU PANIER</button> -->
                                            </form>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </form>
                                    <?php }
                                else{?>
                                    <form action="" method="post">
                                        <div>
                                            <select name="taille_produits" id="">
                                                <option value="taille_kimono">choisissez une taille de Vêtement</option>
                                                <?php
                                                    echo "test";
                                                    foreach($quantite_vetements as $quantite_vetement => $value) {
                                                        $nbrStock = $value['stock_vetements'];
                                                        if ($nbrStock > 0) {
                                                            echo "<option value=" .  $value['id'] . ">" . $value["nom"] . "</option>";
                                                        }
                                                    }
                                                ?>
                                            <?php if(!empty($_SESSION)) { ?>
                                            <form action="" method="post">
                                                <span>
                                                    <input type="number" name="quantité" min = 0 id="input-number" value='0'>
                                                    <button name="ajout" id="ajout-panier">AJOUTER AU PANIER</button>
                                                </span>
                                                <!-- <button name="ajout" id="ajout-panier">AJOUTER AU PANIER</button> -->
                                            </form>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </form>
                                    <?php }
                                ?>
                        </div>

                        <span id="description"><?= $produit[0]['description'] . '<br>'; ?></span>
                        <span><h3>Ref: <?= $produit[0]['reference'] . '<br>'; ?></h3></span>
                    </div>
                </div>
                <section>
                    <h2>Commentaire:</h2>
                    <?php if(!empty($_SESSION)){ ?>
                    <form action="" method="POST">

                    <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
                    <button id="submit-commentaire" type="submit">poster mon commentaire</button>

                    </form><?php
                    }
                    $j = 0;
                    foreach ($affiches as $affiche) {?>
                        <div id="containercomment">
                        <!-- <div id="entête"> -->
                            <div class="login">
                                <?php echo "<div id ='poster-comment'>Posté le :"." ".date_format(date_create($affiche['date']), 'd/m/Y H:i:s').'<br>'.'Posté par :'.' '.$affiche['nom'].'</div>';?>
                            </div>
                            <div class="reponse">
                                <p><?php echo $affiche['commentaire']?></p>
                            </div>
                            <form id="form-rep<?=$affiche['id']?>" action="#form-rep<?=$affiche['id']?>" method="post">
                                <input type="hidden" name="idafficherplus" value="<?= $affiche['id']; ?>">
                                <button type="submit" name="afficher_plus<?=$j?>">afficher les réponse</button>
                                <button class="repondre"name="repondre<?=$j?>">Répondre</button>
                            </form>
                            <?php

                                $idCom = $affiche['id'];

                                $affichesReponses = $commentaire->affichReponse($idCom);


                            if(!empty($_SESSION)){
                                if (isset($_POST["repondre".$j])) {?>
                                    <form action="" method="post">
                                        <input type="text" name='reponse'>
                                        <button type="submit" name='rep'>envoyer</button>
                                        <input type="hidden" name="idReponse" value="<?= $affiche['id']; ?>">
                                        <button type="submit">Annuler</button>
                                    </form>
                                    <?php
                                }
                            }
                            if(isset($_POST["afficher_plus".$j])){
                                foreach ($affichesReponses as $afficheReponse) {
                                    if ($afficheReponse['id_commentaire'] == $affiche['id']  ) { ?>
                                        <div id="container-reponse">
                                            <?php echo "<div id ='poster-reponse'>Posté le :"." ".date_format(date_create($afficheReponse['date']), 'd/m/Y H:i:s').'<br>Posté par :'.' '.$afficheReponse['nom'].'</div>';?>
                                                <div class="reponse">
                                                    <p><?php echo $afficheReponse['reponse']?></p>
                                                </div>
                                        </div>
                                        <form action="" method="post">
                                        <button type="submit" name="annuler">Fermer</button>
                                        </form>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div><?php
                        $j++;
                    }
    ?>
                </section>
            </section>
        </main>
        <?php require_once('footer.php'); ?>