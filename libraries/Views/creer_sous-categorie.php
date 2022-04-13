<?php
    require_once('../Controllers/sousCategorie.php');

    $sous_categorie = new \Models\SousCategorie();
    $fetch = $sous_categorie->recuperation_de_donnee();

    if(!empty($_POST['nom']) && !empty($_POST['categorie'])) {
        $creerSousCategorie = new \Controllers\SousCategorie();
        $creerSousCategorie->creerSousCategorie($_POST['nom'], $_POST['categorie']);
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