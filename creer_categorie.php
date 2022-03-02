<?php
require_once('modelCategorie.php');

$categorie = new Categorie;


if(!empty($_POST['nom'])){
    $nom =  htmlspecialchars($_POST['nom']);
    $categorie->creer_categorie($nom);
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