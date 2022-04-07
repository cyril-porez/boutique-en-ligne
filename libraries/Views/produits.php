<?php
    require_once('../Models/Produits.php');
    require_once('../Models/SousCategorie.php');
    require_once('../Models/Categorie.php');
    
    $id = $_GET['id'];
    
    $sous_categorie = new \Models\SousCategorie;
    $affiche_sous_categorie = $sous_categorie->choix_produit_sous_categorie($id);
    var_dump($affiche_sous_categorie);
    
    echo $id;
?>

<html>

    
    
</html>