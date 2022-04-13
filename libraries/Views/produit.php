<link rel="stylesheet" href="css/produit.css">
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