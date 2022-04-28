<?php
// session_start();
    require_once('../Models/Categorie.php');
    require_once('../Models/SousCategorie.php');

    $afficheCategorie = new \Models\Categorie();
    $afficheHs = $afficheCategorie->selectCategorieH();
    $afficheSs = $afficheCategorie->selectCategorieS();
    $afficheFs = $afficheCategorie->selectCategorieF();
    $afficheEs = $afficheCategorie->selectCategorieE();
    //var_dump($affiche);

    $afficheSousCategorie = new \Models\SousCategorie();
    // var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/connexion.css">
    <script src="js/script.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="produits.css"> -->
    <title>Document</title>
</head>
<body>
    <header>
        <div>
            <div id="icons">
                <form action="" method="get">
                    <input type="search" name="recherche" placeholder="rechercher article">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <?php if(empty($_SESSION)){ ?>
                <button role='button' data-target='#modal' data-toggle='modal' id='connexion-link'><i class="fa-solid fa-user"></i></button>
                <?php }
                    else{ ?>
                    <div class="dropdown" style="float:left;">
                        <button class="dropbtn"><i class="fa-solid fa-user"></i></button>
                        <div class="dropdown-content" style="left:0;">
                        <a href="profil.php">Mon compte</a>
                        <a href="commandes.php">Mes commandes</a>
                        <a href="listedenvie.php">Ma liste d'envie</a>
                        </div>
                    </div>
                <?php } ?>
                <i class="fa-solid fa-envelope"></i>
                <button role='button' data-target='#modal2' data-toggle='modal' id='connexion-link'><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
        </div>
        <!-- Modal -->
                <div class="modal" id="modal" role="dialog">
                    <div class="modal-content">
                        <div class="modal-close" data-dismiss="dialog">X</div>
                        <div class="modal-header">
                            <h3>CONNECTEZ-VOUS</h3>
                        </div>
                        <div class="modal-body">
                            <img src="../images/IMG-1168.PNG" alt="">
                            <form action="" method="post">
                                    <label>EMAIL :</label>
                                    <input type="text" name="email" placeholder="email" autocomplete="off">
                                    <label>Mot de passe :</label>
                                    <input type="mot" name="mot_de_passe" placeholder="Mot de passe" />
                                <button type="submit" name="connection">Connexion</button>
                                <p>Vous n'avez pas de compte ? <br><a href="inscription.php">Creez un compte</a></p>
                                <a href="#">Mot de passe oublié ?</a></p>
                                 <!-- $erreur; -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ------------------modal2-------------------------------->
                <div class="modal" id="modal2" role="dialog">
                    <div class="modal-content">
                        <div class="modal-close" data-dismiss="dialog">X</div>
                            <p></p>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
                <!---------------------------------------------------------------------------------------------->
        <nav>
            <div class="conteneur-nav">
                <ul id="container-ul">
                        <li class="deroulant"><a href="">Hommes</a>
                            <ul class="sous">
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
                    <li class="deroulant"><a href="">Femmes</a>
                        <ul class="sous">
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
                    <li class="deroulant"><a href="">Enfants</a>
                        <ul class="sous">
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
                    <li class="deroulant"><a href="">Sports</a>
                        <ul class="sous">
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
            </div>
        </nav>
    </header>
