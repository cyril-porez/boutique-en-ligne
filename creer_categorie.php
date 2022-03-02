<?php
require_once('class_Produits.php');

$categorie = new Produits;
$nom = htmlspecialchars(isset($_POST['nom'])) ;
if(!empty($nom)){
    $categorie->creer_categorie($nom);
}
elseif(isset($nom) && empty($nom)){
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