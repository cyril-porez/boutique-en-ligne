<?php
require_once('../Models/Produits.php');
$recup_produit = $_GET['produit'];

$produit = new \Models\Produits;

$fetch4 = $produit->recuperation_par_id($recup_produit);
?>

<html>
    <?php echo $fetch4[0]['nom']; ?>
</html>