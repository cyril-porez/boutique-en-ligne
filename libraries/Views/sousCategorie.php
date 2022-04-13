<?php
    require_once('../Models/Model.php');
    require_once('../Controllers/SousCategorie.php');

    $sous_categorie = new \Models\Model();
    $fetch = $sous_categorie->recuperation_de_donnee();

    if(!empty($_POST['nom']) && !empty($_POST['categorie'])){
        $categorie = new \Controllers\SousCategorie;
        $categorie->creerSousCategorie($_POST['nom'], $_POST['categorie']);

    }
    elseif(isset($_POST['nom']) || isset($_POST['categorie'])){
        echo 'champ vide';
    }
?>

<html>
    <form action="" method="post">
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