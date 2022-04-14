<?php
    //require_once('header.php');
    require_once('../Models/Produits.php');
    require_once('../Models/SousCategorie.php');
    require_once('../Models/Categorie.php');

    $id = $_GET['id'];

    $sous_categorie = new \Models\SousCategorie;
    $affiche_sous_categories = $sous_categorie->choix_produit_sous_categorie($id);
//    echo $id;
$chaine =  $affiche_sous_categories[0]['nom'];
    $gant   = 'Gant';
    $kimono = 'Kimono';
?>

<html>
    <body>
        <link rel="stylesheet" href="css/produits.css">
        <header>

        </header>
        <main>
        <section id='filtre'>
            <section class='filtre_header'><h3>FILTRER PAR</h3></section>
            <div id="taille">
                    <?php
                    $verifieGants = strripos($chaine,$gant);
                    $verifieKimono = strripos($chaine, $kimono);

                    if( $verifieGants === 0 || $verifieGants === true ) {?>
                        <form action="" method="post">
                            <input type="checkbox">10oz</input>
                            <input type="checkbox">12oz</input>
                            <input type="checkbox">14oz</input>
                            <input type="checkbox">16oz</input>
                        </form>
                <?php }
                    elseif($verifieKimono === 0 || $verifieKimono === true) {?>
                        <form action="" method="post">
                            <input type="checkbox">A0</input>
                            <input type="checkbox">A1</input>
                            <input type="checkbox">A2</input>
                            <input type="checkbox">A3</input>
                            <input type="checkbox">A4</input>
                            <input type="checkbox">A5</input>
                            <input type="checkbox">C0</input>
                            <input type="checkbox">C00</input>
                            <input type="checkbox">C1</input>
                            <input type="checkbox">C2</input>
                            <input type="checkbox">C3</input>
                            <input type="checkbox">C4</input>
                        </form>
                <?php }
                    else{?>
                        <form action="" method="post">
                            <input type="checkbox">S</input>
                            <input type="checkbox">M</input>
                            <input type="checkbox">L</input>
                            <input type="checkbox">XL</input>
                            <input type="checkbox">XXL</input>
                        </form>
                    <?php }
                    ?>
            </div>
        </section>
            <div class="container">
                <?php
                    foreach($affiche_sous_categories as $affiche_sous_categorie) {?>
                        <div>
                            <img src=<?= $affiche_sous_categorie['image1'];?> alt="image carnage">
                            <?='<br>' . $affiche_sous_categorie['nom']. '<br>';?>
                            <?=$affiche_sous_categorie['prix'] . " €" . '<br>';?>
                            <div id="ajouter-panier">
                                <form action="produit.php" method="get">
                                    <button name="produit" value=<?= $affiche_sous_categorie['id'] ?>>Voir Produit</button>
                                </form>
                            </div>
                        </div><?php
                    }?>
            </div>
        </main>
        <footer>

        </footer>
    </body>
</html>