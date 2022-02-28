<html>
<?php
require_once('class_Produits.php');

    if(!empty($_POST['nom']) && !empty($_POST["reference"]) && !empty($_POST["classe"]) && !empty($_POST["description"]) && !empty($_POST["id_utilisateur"]) && isset($_POST["id_categorie"]) && isset($_POST["id_sous-categorie"])){
        $produits = new Produits;
        $produits->inserer_produit($_POST['nom'], $_POST["reference"], $_POST["classe"], $_POST["description"], $_POST["id_utilisateur"], $_POST["id_categorie"], $_POST["id_sous-categorie"]);
    }
    else {
        echo "vide";
    }
?>


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
    </select>

    <label for="description">description</label>
    <input type="text" name="description">

    <label for="id_utilisateur">id_utilisateur</label>
    <input type="number" name="id_utilisateur">

    <label for="id_categorie">id_categorie</label>
    <input type="number" name="id_categorie">

    <label for="id_sous-categorie">id_sous-categorie</label>
    <input type="number" name="id_sous-categorie">

    <input type="submit" value="creer">
</form>

</main>
</html>