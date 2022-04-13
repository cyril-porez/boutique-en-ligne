<?php
    require_once('../Models/Categorie.php');
    require_once('../Models/SousCategorie.php');

    $afficheCategorie = new \Models\Categorie();
    $afficheHs = $afficheCategorie->selectCategorieH();
    $afficheSs = $afficheCategorie->selectCategorieS();
    $afficheFs = $afficheCategorie->selectCategorieF();
    $afficheEs = $afficheCategorie->selectCategorieE();
    //var_dump($affiche);

    $afficheSousCategorie = new \Models\SousCategorie();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="produits.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="">Hommes</a>
                    <ul>
                        <?php
                            foreach($afficheHs as $afficheH) {
                                echo '<li><a href=listeProduits.php?id='. $afficheH['id'] . '>' . $afficheH['nom'] . '</a>';
                                $afficheSousCategorieHommes = $afficheSousCategorie->selectSousCategorie($afficheH['id']);?>
                                    <ul>
                                        <?php
                                            foreach($afficheSousCategorieHommes as $afficheSousCategorieHomme) {
                                                echo '<li><a href=produits.php?id=' . $afficheSousCategorieHomme['id'] . '>' . $afficheSousCategorieHomme['nom'] . '</a>';?>                                                
                                                </li>
                                                <?php
                                            }
                                            ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </li>
                <li><a href="">Femmes</a>
                    <ul>
                        <?php
                            foreach($afficheFs as $afficheF) {
                                echo '<li><a href=listeProduits.php?id='. $afficheF['id'] . '>' . $afficheF['nom'] . '</a>';
                                $afficheSousCategorieFemmes = $afficheSousCategorie->selectSousCategorie($afficheF['id']);?>
                                    <ul>
                                        <?php
                                            foreach($afficheSousCategorieFemmes as $afficheSousCategorieFemme) {
                                                echo '<li><a href=produits.php?id=' . $afficheSousCategorieFemme['id'] . '>' . $afficheSousCategorieFemme['nom'] . '</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </li>
                <li><a href="">Enfants</a>
                    <ul>
                        <?php
                            foreach($afficheEs as $afficheE) {
                                echo '<li><a href=listeProduits.php?id=' . $afficheE['id'] . '>' . $afficheE['nom'] . '</a>';
                                $afficheSousCategorieEnfants = $afficheSousCategorie->selectSousCategorie($afficheE['id']);?>
                                    <ul>
                                        <?php
                                            foreach($afficheSousCategorieEnfants as $afficheSousCategorieEnfant) {
                                                echo '<li><a href=produits.php?id=' . $afficheSousCategorieEnfant['id'] . '>' . $afficheSousCategorieEnfant['nom'] . '</a></li>';                                              
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </li>
                <li><a href="">Sports</a>
                    <ul>
                        <?php
                            foreach($afficheSs as $afficheS) {
                                echo '<li><a href=listeProduits.php?id='. $afficheS['id'] . '>' . $afficheS['nom'] . '</a>';
                                $afficheSousCategorieSports = $afficheSousCategorie->selectSousCategorie($afficheS['id']);?>
                                    <ul>
                                        <?php
                                            foreach($afficheSousCategorieSports as $afficheSousCategorieSport) {
                                                echo '<li><a href=produits.php?id=' . $afficheSousCategorieSport['id'] . '>' . $afficheSousCategorieSport['nom'] . '</a></li>';                                              
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <?php

        ?>
    </main>
    <footer>

    </footer>
</body>
</html>