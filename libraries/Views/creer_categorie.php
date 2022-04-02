<?php
    require_once('../Controllers/Categorie.php');

    


    if(!empty($_POST['nom'])){
        $categorie = new \Controllers\Categorie;
        $categorie->creerCategorie($_POST['nom']);
    }

?>

<html>
<form action="creer_categorie.php" method="post">
    <label for="nom">nom</label>
    <input type="text"  name="nom">
    <input type="submit" value="creer">
</form>
</html>