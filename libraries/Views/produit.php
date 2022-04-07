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
    <?php
        echo $produit[0]['nom'] . '<br>';
        echo $produit[0]['reference'] . '<br>';
        echo $produit[0]['description'] . '<br>';  
        echo $produit[0]['prix'] . ' €' . '<br>';  
    ?>
    <img src=<?= $produit[0]['image1'] ?> alt="">
    <button>AJOUTER AU PANNIER</button>

    <form action="" method="post">
        <button type="submit" name="jaime">j'aime</button>
        <button type="submit" name="deteste">deteste</button>
    </form>
</html>