<?php
require_once('class_Produits.php');

$sous_categorie = new Produits;

$fetch = $sous_categorie->selection_categorie();

if(!empty($_POST['nom']) && !empty($_POST['categorie'])){
    $sous_categorie->creation_sous_categorie($_POST['nom'], $_POST['categorie']);
}
elseif(isset($_POST['nom'], $_POST['categorie']) && empty($_POST['nom']) && empty($_POST['categorie'])){
    echo 'champ vide';
}
?>
<html>
    <form action="creer_sous-categorie.php" method="post">
        <label for="nom">nom</label>
        <input type="text"  name="nom">
        <select name="categorie">
                    <option value="choose" name="choose">Choisir une catégorie d'article</option>
                    <?php
                        foreach($fetch as $value) {
                            echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                        }
                    ?>
        </select>
        <input type="submit" value="creer">
    </form>
</html>