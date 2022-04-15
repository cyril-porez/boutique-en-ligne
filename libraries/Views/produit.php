<link rel="stylesheet" href="css/produit.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<?php
    require_once('../Models/Produits.php');
    require_once('../Controllers/Produits.php');

    $recup_produit = $_GET['produit'];

    $produits = new \Models\Produits;
    $jaimeDeteste = new \Controllers\Produits;

    $produit = $produits->selection_produits($recup_produit);

    if(isset($_POST["jaime"])) {
        $jaimeDeteste->jaime($recup_produit);
    }
    else if (isset($_POST["deteste"])) {
        $jaimeDeteste->deteste($recup_produit);
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
                    </form>
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
                                        <label for="checkbox">XL</label>
                                        <input type="checkbox">
                                        <label for="checkbox">XXL</label>
                                        <input type="checkbox">
                                    </div>
                                </form>
                            <?php }
                            ?>
                    </div>
                    <span>
                        <input type="number" name="quantité" id="input-number">
                        <button id="ajout-panier">AJOUTER AU PANIER</button>
                    </span>
                    <span id="description"><?= $produit[0]['description'] . '<br>'; ?></span>
                    <span><h3>Ref: <?= $produit[0]['reference'] . '<br>'; ?></h3></span>
                </div>
            </div>
        </main>
        <footer>

        </footer>
    </body>
</html>