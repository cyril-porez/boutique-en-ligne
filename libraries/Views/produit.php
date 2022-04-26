<link rel="stylesheet" href="css/produit.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<?php

    session_start();

    require_once('../Models/Produits.php');
    require_once('../Controllers/Produits.php');
    require_once('../Controllers/Utilisateurs.php');
    require_once('../Controllers/Stock.php');

    $idProduit = $_GET['produit'];
    $idUtilisateur = $_SESSION['utilisateurs'][0]['id'];

    //Modifier et appeler le controlleur
    $produits = new \Models\Produits();
    $produit = $produits->selection_produits($idProduit);

    $jaimeDeteste = new \Controllers\Produits();
    
    $produitFavoris = new \Controllers\Utilisateurs();
    $produitFavoris->mettreProduitFavoris($idUtilisateur, $idProduit);
    $produitFavoris->ajoutPanier($idUtilisateur, $idProduit, isset($_Post['quantite']), isset($_POST['ajout']));

    
    $verifQuantiteKimono = new \Controllers\Stock();
    $quantiteKimonos = $verifQuantiteKimono->verifStockQuantiteKimono($idProduit);
    //var_dump($quantiteKimonos);   

    if(isset($_POST["jaime"])) {
        $jaimeDeteste->jaime($idProduit);
    }
    else if (isset($_POST["deteste"])) {
        $jaimeDeteste->deteste($idProduit);
    }

    $chaine =  $produit[0]['nom'];
    $gant   = 'Gant';
    $kimono = 'Kimono';
?>

<html>
    <body>
    <header>

    </header>
        <main>
            <div id="container-produit">
                <div id="container-img">
                    <img src=<?= $produit[0]['image1'] ?> alt="">
                </div>
                <div id="container-description">

                    <span><h3><?= $produit[0]['nom'] . '<br>'; ?></h3></span>
                    <span><h2><?= $produit[0]['prix'] . ' €' . '<br>'; ?></h2></span>

                    <form action="" method="post">
                        <button type="submit" name="jaime">j'aime</button>
                        <button type="submit" name="deteste">deteste</button>
                        <button type="submit" name="favoris">enregistrer</button>
                    </form>

                    <div id="taille">
                        <?php
                            $verifieGants = strripos($chaine,$gant);
                            $verifieKimono = strripos($chaine, $kimono);

                            if( $verifieGants === 0 || $verifieGants === true ) {?>
                                <form action="" method="post">
                                    <select name="taille_produits" id="">
                                        <option value="oz">choisissez une taille de gant</option>
                                        <option value="oz">10oz</option>
                                        <option value="oz">12oz</option>
                                        <option value="oz">14oz</option>
                                        <option value="oz">16oz</option>
                                    </select>
                                    
                                </form>
                        <?php }
                            elseif($verifieKimono === 0 || $verifieKimono === true) {?>
                                <form action="" method="post">
                                    <div>
                                        <select name="taille_produits" id="">
                                            <option value="taille_kimono">choisissez une taille de Kimono</option>
                                            <?php
                                                 foreach($quantiteKimonos as $quantiteKimono => $value) {                                                    
                                                    $nbrStock = $value['stock_kimono'];
                                                    if ($nbrStock > 0) {
                                                        echo "<option value=" .  $value['id'] . ">" . $value["nom"] . "</option>";
                                                    }
                                                }                                            
                                            ?>
                                        </select>                                        
                                    </div>
                                    <span>
                                        <input type="number" name="quantité" min = 0 id="input-number" value='0'>
                                        <button name="ajout" id="ajout-panier">AJOUTER AU PANIER</button>
                                    </span>
                                </form>
                        <?php }
                            else{?>
                                <form action="" method="post">
                                    <div>
                                        <select name="taille_produits" id="">
                                            <option value="taille_basic">choisissez une taille</option>
                                            <option value="taille_basic">S</option>
                                            <option value="taille_basic">M</option>
                                            <option value="taille_basic">L</option>
                                            <option value="taille_basic">XL</option>
                                            <option value="taille_basic">XXL</option>
                                        </select>                                            
                                    </div>
                                    <span>
                                        <input type="number" name="quantité" min = 0 id="input-number" value='0'>
                                        <button name="ajout" id="ajout-panier">AJOUTER AU PANIER</button>
                                    </span>
                                </form>
                            <?php }
                            ?>
                    </div>
                    
                    <span id="description"><?= $produit[0]['description'] . '<br>'; ?></span>
                    <span><h3>Ref: <?= $produit[0]['reference'] . '<br>'; ?></h3></span>
                </div>
            </div>
            <section>
                <?php
                    include_once('commentaire.php');
                ?>
            </section>
        </main>
        <footer>

        </footer>
    </body>
</html>