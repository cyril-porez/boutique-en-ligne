<?php
require_once('class_Produits.php');

$sous_categorie = new Produits;

$fetch = $sous_categorie->selection_categorie();
$nom = htmlspecialchars(isset($_POST['nom']));

if(!empty($nom) && !empty($_POST['categorie'])){
    $sous_categorie->creation_sous_categorie($_POST['nom'], $_POST['categorie']);
}
elseif(isset($nom, $_POST['categorie']) && empty($nom) && empty($_POST['categorie'])){
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