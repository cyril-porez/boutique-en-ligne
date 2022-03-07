<?php
require_once('modelCategorie.php');

$categorie = new Categorie;


if(!empty($_POST['nom'])){
    $nom =  htmlspecialchars($_POST['nom']);
    $recupere = $categorie->verif_si_existe_deja($nom);
    if(count($recupere) == 0){
        $categorie->creer_categorie($nom);
      }
      else{
          echo 'categorie déja existante';
      }

}
elseif(isset($_POST['nom']) && empty($_POST['nom'])){
    echo 'champ vide';
}
?>
<html>
<form action="creer_categorie.php" method="post">
    <label for="nom">nom</label>
    <input type="text"  name="nom">
    <input type="submit" value="creer">
</form>
</html>