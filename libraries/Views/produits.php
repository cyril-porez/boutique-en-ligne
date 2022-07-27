<?php
    //require_once('header.php');
    require_once('../Models/Produits.php');
    require_once('../Models/SousCategorie.php');
    require_once('../Models/Categorie.php');

    session_start();

    $id = $_GET['id'];

    $sousCategorie = new \Models\SousCategorie;
    $afficheSousCategories = $sousCategorie->choix_produit_sous_categorie($id);
    $chaine =  $afficheSousCategories[0]['nom'];
    $gant   = 'Gant';
    $kimono = 'Kimono';
    $short = 'Short';
?>

        <?php require_once('header.php'); ?>
        <main>
            <section id="produits">
                <section id='filtre'>
                    <section class='filtre_header'><h3>FILTRER PAR</h3></section>
                    <div id="taille">
                            <?php
                            $verifieGants = strripos($chaine,$gant);
                            $verifieKimono = strripos($chaine, $kimono);
                            $verifieShort = strripos($chaine, $short);

                            if( $verifieGants === 0 || $verifieGants === true ) {?>
                                <form action="" method="post">
                                    <select name="taille_produits" id="">
                                        <option value="oz">choisissez une taille de gant</option>
                                        <option value="oz">10oz</option>
                                        <option value="oz">12oz</option>
                                        <option value="oz">14oz</option>
                                        <option value="oz">16oz</option>
                                    </select>
                                    <button type="submit" name="taille">valider</button>
                                </form>
                        <?php }
                            elseif($verifieKimono === 0 || $verifieKimono === true) {?>
                                <form action="" method="post">
                                    <div>
                                        <select name="taille_produits" id="">
                                            <option value="taille_kimono">choisissez une taille de Kimono</option>
                                            <option value="taille_kimono">A0</option>
                                            <option value="taille_kimono">A1</option>
                                            <option value="taille_kimono">A2</option>
                                            <option value="taille_kimono">A3</option>
                                            <option value="taille_kimono">A4</option>
                                            <option value="taille_kimono">A5</option>
                                            <option value="taille_kimono">C00</option>
                                            <option value="taille_kimono">C0</option>
                                            <option value="taille_kimono">C1</option>
                                            <option value="taille_kimono">C2</option>
                                            <option value="taille_kimono">C3</option>
                                            <option value="taille_kimono">C4</option>
                                        </select>
                                        <button type="submit" name="taille">valider</button>
                                    </div>
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
                                            <button type="submit" name="taille">valider</button>
                                        </div>
                                </form>
                            <?php }
                            ?>
                    </div>
                </section>
                <section>
                    <?php if( $verifieGants === 0 || $verifieGants === true ) { ?>
                                    <h1>GANTS</h1>
                            <?php }
                                elseif($verifieKimono === 0 || $verifieKimono === true) { ?>
                                    <h1>KIMONOS</h1>
                                <?php }
                                elseif($verifieShort === 0 || $verifieShort === true) { ?>
                                    <h1>SHORTS</h1>
                                <?php } ?>
                        <div id="container">
                            <?php
                                foreach($afficheSousCategories as $afficheSousCategorie) {?>
                                    <div>
                                        <img src=<?= $afficheSousCategorie['image1'];?> alt="image carnage">
                                        <?='<br>' . $afficheSousCategorie['nom']. '<br>';?>
                                        <?=$afficheSousCategorie['prix'] . " €" . '<br>';?>
                                        <div id="ajouter-panier">
                                            <form action="produit.php" method="get">
                                                <button name="produit" value=<?= $afficheSousCategorie['id'] ?>>Voir Produit</button>
                                            </form>
                                        </div>
                                    </div><?php
                                }?>
                    </div>
                        </section>
                </section>
            </main>
        <?php require_once('footer.php'); ?>