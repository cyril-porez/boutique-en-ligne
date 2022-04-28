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

<?php require_once('header.php'); ?>
    <main>
        <div>
            <a href="admin.php"><button>retour</button></a>
            <a href="creer_categorie.php"><button>gestion des catégories</button></a>
            <a href="creer_sous-categorie.php"><button>gestion des sous-categories</button></a>
        </div>
    </main>
    <?php require_once('footer.php'); ?>