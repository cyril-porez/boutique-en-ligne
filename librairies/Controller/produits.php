<?php
require_once('../Models/class_Produits.php');
require_once('../Models/modelCategorie.php');
require_once('../Models/modelSousCategorie.php');
$produits = new Produits;
$sous_categorie = new SousCategorie;
$categorie = new Categorie;
$fetch = $produits->recuperation_de_donnee();
$fetch2 = $produits->recuperation_de_donnee2();
$fetch3 = $produits->selection_produits();

?>