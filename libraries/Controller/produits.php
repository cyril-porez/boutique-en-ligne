<?php
    require_once('../Models/class_Produits.php');
    require_once('../Models/modelCategorie.php');
    require_once('../Models/modelSousCategorie.php');

    $produits = new Produits;
    $sous_categorie = new SousCategorie;
    $categorie = new Categorie;
    $recup_tout_categorie = $categorie->recuperation_de_donnee();
    $id_categorie = $recup_tout_categorie[0]['id'];
    //  on determine sur quelle page on se trouve
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $pageCourante = (int) htmlspecialchars($_GET['page']);
    }
    else{
        $pageCourante = 1;
    }


    // dans mon model Produit je determine le nombre totale de produits
    $nombre_produits = $produits->determination_nombre_total_de_produits();

    // determination du nombre de produits par page
    $produits_par_page = 5;

    //  calcul du nombre de page totale/ la fonction "ceil" permet d'arrondir a l'entier supèrieur
    $pages = ceil($nombre_produits[0] / $produits_par_page);

    //  calcul du premier produit de chaque page

    $premier = ($pageCourante * $produits_par_page) - $produits_par_page;
    // ----------------------------------------pagination par categorie----------------------------

        // dans mon model Produit je determine le nombre totale de produits
    $nombre_produits_categories = $categorie->determination_nombre_total_de_produits_categories($id_categorie);

    // determination du nombre de produits par page
    $produits_par_page_categories = 5;

    //  calcul du nombre de page totale/ la fonction "ceil" permet d'arrondir a l'entier supèrieur
    $pages_categories = ceil($nombre_produits_categories[0] / $produits_par_page_categories);

    //  calcul du premier produit de chaque page

    $premier_categories = ($pageCourante * $produits_par_page_categories) - $produits_par_page_categories;

    // $fetch = $produits->recuperation_de_donnee();
    $fetch2 = $produits->recuperation_de_donnee2();
    // $fetch3 = $produits->selection_produits();
?>