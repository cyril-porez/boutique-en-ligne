<?php
require_once('class_Produits.php');
$recup_produit = $_GET['produit'];

$produit = new Produits;

$fetch4 = $produit->recuperation_par_id($recup_produit);
?>

<html>
    <?php echo $fetch4[0]['nom']; ?>
</html>