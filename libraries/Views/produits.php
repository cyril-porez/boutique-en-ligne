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
        <link rel="stylesheet" href="css/listeProduits.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                            <label for="checkbox">10oz</label>
                            <input type="checkbox">
                            <label for="checkbox">12oz</label>
                            <input type="checkbox">
                            <label for="checkbox">14oz</label>
                            <input type="checkbox">
                            <label for="checkbox">16oz</label>
                            <input type="checkbox">
                        </form>
                <?php }
                    elseif($verifieKimono === 0 || $verifieKimono === true) {?>
                        <form action="" method="post">
                            <div>
                                <label for="checkbox">A0</label>
                                <input type="checkbox">
                                <label for="checkbox">A1</label>
                                <input type="checkbox">
                                <label for="checkbox">A2</label>
                                <input type="checkbox">
                                <label for="checkbox">A3</label>
                                <input type="checkbox">
                            </div>
                            <div>
                                <label for="checkbox">A4</label>
                                <input type="checkbox">
                                <label for="checkbox">A5</label>
                                <input type="checkbox">
                                <label for="checkbox">C0</label>
                                <input type="checkbox">
                                <label for="checkbox">C00</label>
                                <input type="checkbox">
                            </div>
                            <div>
                                <label for="checkbox">C1</label>
                                <input type="checkbox">
                                <label for="checkbox">C2</label>
                                <input type="checkbox">
                                <label for="checkbox">C3</label>
                                <input type="checkbox">
                                <label for="checkbox">C4</label>
                                <input type="checkbox">
                            </div>
                        </form>
                <?php }
                    else{?>
                        <form action="" method="post">
                                <div>
                                    <label for="checkbox">S</label>
                                    <input type="checkbox">
                                    <label for="checkbox">M</label>
                                    <input type="checkbox">
                                    <label for="checkbox">L</label>
                                    <input type="checkbox">
                                </div>
                                <div>
                                    <label for="checkbox">XL</label>
                                    <input type="checkbox">
                                    <label for="checkbox">XXL</label>
                                    <input type="checkbox">
                                </div>
                        </form>
                    <?php }
                    ?>
            </div>
        </section>
            <div id="container">
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