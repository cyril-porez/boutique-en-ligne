<?php

  
    require_once('../Controllers/Categorie.php');
    require_once('../Controllers/SousCategorie.php');

    $Categorie = new \Controllers\Categorie();
    $afficheCategories = $Categorie->selectCategorie();
    //var_dump($afficheCategories);
    $sousCategorie = new \Controllers\SousCategorie();
    $afficheSousCategories = $sousCategorie->selectSousCategorie();    
    //var_dump($afficheSousCategories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modal.css">
    <script src="js/script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <button><a href="creer_categorie.php">gestion Catégorie</a> </button>
        <button><a href="creer_sous-categorie.php">gestion sous categorie</a></button>
        
    </main>
    <footer>

    </footer>
</body>
</html>