<html>
<?php
require_once('class_Produits.php');
$produits = new Produits;
$nom = htmlspecialchars(isset($_POST['nom']));
$reference = htmlspecialchars(isset($_POST['reference']));
$description = htmlspecialchars(isset($_POST['description']));
$prix = htmlspecialchars(isset($_POST['prix']));
$fetch = $produits->selection_categorie();
$fetch2 = $produits->selection_sous_categorie();
    if(!empty($nom) && !empty($reference) && !empty($_POST["classe"]) && !empty($description) && !empty($_POST["id_utilisateur"]) && !empty($_POST["categorie"]) && !empty($_POST["sous-categorie"]) && !empty($prix)){
        $produits->inserer_produit($nom, $reference, $_POST["classe"], $description, $_POST["id_utilisateur"], $_POST["categorie"], $_POST["sous-categorie"], $prix);
    }
    else if(isset($nom, $reference, $_POST["classe"], $description, $_POST["id_utilisateur"], $_POST["categorie"], $_POST["sous-categorie"], $prix) &&
            empty($nom) && empty($reference) && empty($_POST["classe"]) && empty($description) && empty($_POST["id_utilisateur"]) && empty($_POST["categorie"]) && empty($_POST["sous-categorie"]) && empty($prix)){
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
    </select>

    <label for="description">description</label>
    <input type="text" name="description">

    <label for="id_utilisateur">id_utilisateur</label>
    <input type="number" name="id_utilisateur">

    <select name="categorie">
        <option value="choose" name="choose">Choisir une catégorie d'article</option>
        <?php
            foreach($fetch as $value) {
                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
            }
        ?>
    </select>

    <select name="sous-categorie">
        <option value="choose" name="choose">Choisir une catégorie d'article</option>
        <?php
            foreach($fetch2 as $value) {
                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
            }
        ?>
    </select>

    <label for="prix">prix</label>
    <input type="text" name="prix">

    <input type="submit" value="creer">
</form>

</main>
</html>