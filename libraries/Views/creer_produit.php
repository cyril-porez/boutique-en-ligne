<?php

    require_once('../Controllers/Produits.php');
    require_once('../Models/Produits.php');
    // require_once('modelCategorie.php');
    // require_once('modelSousCategorie.php');

    $produits = new \Models\Produits();
    $fetchCategories = $produits->recuperation_de_donnee();
    $fetchSousCategories = $produits->recuperation_de_donnee2();

    if(!empty($_POST['nom']) && !empty($_POST['reference']) && !empty($_POST['classe']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['sous-categorie']) && !empty($_POST['prix']) && !empty($_POST['image'])){
        $creerProduit = new \Controllers\Produits();
        $creerProduit->creerProduit($_POST['nom'], $_POST['reference'], $_POST['classe'], $_POST['description'], $_POST['categorie'], $_POST['sous-categorie'], $_POST['prix'], $_POST['image']);
    }


   
?>

<html>
    <main>

        <form action="creer_produit.php" method="post">
            <label for="nom">nom</label>
            <input type="text"  name="nom">

            <label for="reference">reference</label>
            <input  name="reference">

            <label for="classe">classe</label>
            <select name="classe">
                <option >Choisissez une option</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="enfant">Enfant</option>
                <option value="Sport">Sport</option>
            </select>

            <label for="description">description</label>
            <input type="text" name="description">

            <!--<label for="id_utilisateur">id_utilisateur</label>
            <input type="number" name="id_utilisateur">-->

            <select name="categorie">
                <option value="choose" name="choose">Choisir une catégorie d'article</option>
                <?php
                    foreach($fetchCategories as $value) {
                        echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                    }
                ?>
            </select>

            <select name="sous-categorie">
                <option value="choose" name="choose">Choisir une sous-catégorie d'article</option>
                <?php
                    foreach($fetchSousCategories as $value) {
                        echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                    }
                ?>
            </select>

            <label for="image">image</label>
            <input type="text" name="image">

            <label for="prix">prix</label>
            <input type="text" name="prix">

            <input type="submit" value="creer">
        </form>
    </main>
</html>