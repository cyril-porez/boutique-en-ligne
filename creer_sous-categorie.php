<?php
    require_once('modelSousCategorie.php');

    $sous_categorie = new SousCategorie;

    $fetch = $sous_categorie->recuperation_de_donnee();


if(!empty($_POST['nom']) && !empty($_POST['categorie'])){
    $nom = htmlspecialchars($_POST['nom']);
    $recupere = $sous_categorie->verif_si_existe_deja($nom);
    if(count($recupere) == 0){
        $sous_categorie->creation_sous_categorie($nom, $_POST['categorie']);
      }
      else{
          echo 'sous_categorie déja existante';
      }

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