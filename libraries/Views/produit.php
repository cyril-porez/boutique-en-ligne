<?php
    require_once('../Models/Produits.php');
    require_once('../Controllers/Produits.php');

    $recup_produit = $_GET['produit'];

    $produits = new \Models\Produits;
    $jaimeDeteste = new \Controllers\Produits;

    $produit = $produits->selection_produits($recup_produit);

    var_dump($produit);

    if(isset($_POST["jaime"])) {
        $jaimeDeteste->jaime($recup_produit);
    }
    else if (isset($_POST["deteste"])) {
        $jaimeDeteste->deteste($recup_produit);
    }
?>

<html>
    <?php// echo $fetch4[0]['nom']; ?>

    <form action="" method="post">
        <button type="submit" name="jaime">j'aime</button>
        <button type="submit" name="deteste">deteste</button>
    </form>
</html>