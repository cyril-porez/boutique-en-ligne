<?php
    require_once('modelSousCategorie.php');

    $sous_categorie = new SousCategorie;

    $fetch = $sous_categorie->selection_categorie();


if(!empty($_POST['nom']) && !empty($_POST['categorie'])){
    $nom = htmlspecialchars($_POST['nom']);
    $sous_categorie->creation_sous_categorie($nom, $_POST['categorie']);
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
                    <option value="choisir" name="choose">Choisir une catégorie d'article</option>
                    <?php
                        foreach($fetch as $value) {
                            echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                        }
                    ?>
        </select>
        <input type="submit" value="creer">
    </form>
</html>