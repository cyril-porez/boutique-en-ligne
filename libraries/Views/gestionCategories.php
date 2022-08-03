<?php

    require_once('../autoload.php');
    session_start();

    $Categorie = new \Controllers\Categorie();
    $afficheCategories = $Categorie->selectCategorie();
    //var_dump($afficheCategories);
    $sousCategorie = new \Controllers\SousCategorie();
    $afficheSousCategories = $sousCategorie->selectSousCategorie();
    //var_dump($afficheSousCategories);
?>

<?php require_once('header.php'); ?>
    <main>
        <a id="back-button" href="admin.php">retour</a>
        <div id="button-container">
            <a href="creer_categorie.php"><button>Gestion des catégories</button></a>
            <a href="creer_sous-categorie.php"><button>Gestion des sous-catégories</button></a>
        </div>
    </main>
    <?php require_once('footer.php'); ?>