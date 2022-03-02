<html>
<?php
require_once('class_Produits.php');
$produits = new Produits;
$fetch = $produits->selection_categorie();
$fetch2 = $produits->selection_sous_categorie();
    if(!empty($_POST['nom']) && !empty($_POST["reference"]) && !empty($_POST["classe"]) && !empty($_POST["description"]) && isset($_POST["categorie"]) && isset($_POST["sous-categorie"]) && isset($_POST['prix']) && !empty($_POST["image"])){
        $produits->inserer_produit($_POST['nom'], $_POST["reference"], $_POST["classe"], $_POST["description"], $_POST["categorie"], $_POST["sous-categorie"], $_POST['prix'], $_POST["image"],);
    }
    else if(isset($_POST['nom'], $_POST["reference"], $_POST["classe"], $_POST["description"], $_POST["image"], $_POST["categorie"], $_POST["sous-categorie"], $_POST['prix']) &&
            empty($_POST['nom']) && empty($_POST["reference"]) && empty($_POST["classe"]) && empty($_POST["description"]) && empty($_POST["image"]) && empty($_POST["categorie"]) && empty($_POST["sous-categorie"]) && empty($_POST['prix'])){
                echo 'champ vide';
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
        <option value="Sport">Sport</option>
    </select>

    <label for="description">description</label>
    <input type="text" name="description">

    <!--<label for="id_utilisateur">id_utilisateur</label>
    <input type="number" name="id_utilisateur">-->

    <select name="categorie">
        <option value="choose" name="choose">Choisir une catégorie d'article</option>
        <?php
            foreach($fetch as $value) {
                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
            }
        ?>
    </select>

    <select name="sous-categorie">
        <option value="choose" name="choose">Choisir une sous-catégorie d'article</option>
        <?php
            foreach($fetch2 as $value) {
                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
            }
        ?>
    </select>

    <label for="image">image</label>
    <input type="text" name="image">

    <label for="prix">prix</label>
    <input  name="prix">

    <input type="submit" value="creer">
</form>

</main>
</html>