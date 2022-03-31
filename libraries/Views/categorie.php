<?php

    require_once('../Controllers/Categorie.php');

    if(!empty($_POST['nom'])) {
        $categorie = new \Controllers\Categorie();
        $categorie->creerCategorie($_POST['nom']);
    }
    elseif(isset($_POST['nom'])) {
        echo 'champ vide';
    }
?>

<html>
    <body>
        <main>
            <form action="" method="post">
                <label for="nom">nom</label>
                <input type="text"  name="nom">
                <input type="submit" value="creer">
            </form>
        </main>
    </body>
</html>