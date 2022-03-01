<?php
require_once('class_Produits.php');

$categorie = new Produits;

if(!empty($_POST['nom'])){
    $categorie->creer_categorie($_POST['nom']);
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