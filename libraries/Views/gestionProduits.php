<?php
    require_once('../Controllers/admin.php');

    $produits = new \Models\Admin();
    $produit = $produits->selectionneProduits();
    var_dump($produit);
?>