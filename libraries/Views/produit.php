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
                            $verifieGants = strripos($chaine, $gant);
                            $verifieKimono = strripos($chaine, $kimono);

                            if($verifieGants === false) {?>
                                <form action="" method="post">
                                    <input type="checkbox">10oz</input>
                                    <input type="checkbox">12oz</input>
                                    <input type="checkbox">14oz</input>
                                    <input type="checkbox">16oz</input>
                                </form>
                        <?php }
                            elseif($verifieKimono === false) {?>
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
                            elseif ($verifieKimono === false && $verifieGants === false) {?>
                                <form action="" method="post">
                                    <input type="checkbox">S</input>
                                    <input type="checkbox">M</input>
                                    <input type="checkbox">L</input>
                                    <input type="checkbox">XL</input>
                                    <input type="checkbox">XXL</input>
                                </form>
                            <?php } ?>
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