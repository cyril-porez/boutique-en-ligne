<?php

    require_once('../Models/Produits.php');
    require_once('../Models/Model.php');
    require_once('../Controllers/Produits.php');

    $produits = new Models\Model();
    $fetchCategories = $produits->recuperation_de_donnee();
    $fetchSousCategories = $produits->recuperation_de_donnee2();

    if(!empty($_POST['nom']) && !empty($_POST['reference']) && !empty($_POST['classe']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['sous-categorie']) && !empty($_POST['prix']) && !empty($_POST['image'])){
        $produit = new Controllers\Produits();
        $produit->creerProduit($_POST['nom'], $_POST['reference'], $_POST['classe'], $_POST['description'], $_POST['categorie'], $_POST['sous-categorie'], $_POST['prix'], $_POST['image']);
    }
    else if(isset($nom) || isset($reference) || isset($_POST["classe"]) || isset($description) || isset($_POST["id_utilisateur"]) || isset($_POST["categorie"]) || isset($_POST["sous-categorie"]) || isset($prix) || isset($image)){
        echo 'champ vide';
    }
?>


<html>
    <main>

        <form action="" method="post">
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

            <select name="categorie">
                <option value="choose" name="choose">Choisir une catégorie d'article</option>
                <option>
                    <?php
                        foreach($fetchCategories as $value) {
                            echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                        }
                    ?>
                </option>
            </select>

            <select name="sous-categorie">
                <option value="choose" name="choose">Choisir une sous-catégorie d'article</option>
                <option>
                    <?php
                        foreach($fetchSousCategories as $value) {
                            echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                        }
                    ?>
                </option>
            </select>

    <label for="image">image</label>
    <input type="text" name="image">

    <label for="prix">prix</label>
    <input type="text" name="prix">

    <input type="submit" value="creer">
</form>

</main>
</html