<?php
// session_start();
require_once('../Models/Categorie.php');
require_once('../Models/SousCategorie.php');
require_once("../Controllers/Connexion.php");
require_once('../Controllers/barreRecherche.php');
$erreur = "";
if (!empty($_POST['email']) && !empty($_POST['mot_de_passe'])) {
    $connex = new \Controllers\Connexion();
    $erreur = $connex->connexion();
}
$afficheCategorie = new \Models\Categorie();
$afficheHs = $afficheCategorie->selectCategorieH();
$afficheSs = $afficheCategorie->selectCategorieS();
$afficheFs = $afficheCategorie->selectCategorieF();
$afficheEs = $afficheCategorie->selectCategorieE();

$afficheSousCategorie = new \Models\SousCategorie();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="css/gestion.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/inscription.css">
    <link rel="stylesheet" href="css/listeProduits.css">
    <link rel="stylesheet" href="css/favoris.css">
    <link rel="stylesheet" href="css/modificationDonnee.css">
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="css/produit.css">
    <link rel="stylesheet" href="css/commentaire.css">
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="css/commandes.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/script.js" defer></script>
    <script src="js/header.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CARNAGE</title>
</head>

<body>
    <header>

        <div class="top-header" id="desktop-header">
            <div class="button-search-burger">
                <button type="button" class="button-burger">☰</button>
            </div>
            <div class="logo-container">
                <img src="images/IMG-1168.png" alt="" class="logo-img">
            </div>
            <div class="icons-search">
                <form action="rechercheProduits.php" method="get" class="form-search">
                    <input type="search" name="recherche" placeholder="Rechercher un article" class="input-search">
                    <button type="submit" class="button-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <?php if (!isset($_SESSION['utilisateurs'])) { ?>
                    <div class="dropdown">
                        <button type="button" class="button-user" data-target='#modal' data-toggle='modal' id='connexion-link'>
                            <i class="fa-solid fa-user"></i>
                        </button>
                    </div>

                <?php } else { ?>
                    <div class="dropdown">
                        <button class="button-user">
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="profil.php" class="droplink">Mon compte</a>
                            <a href="listeCommandes.php" class="droplink">Mes commandes</a>
                            <a href="mesFavoris.php" class="droplink">Ma liste d'envie</a>
                            <a href="panier.php" class="droplink">Mon Panier</a>
                            <a href="deconnexion.php" class="droplink">Me deconnecter</a>
                            <?php if (!empty($_SESSION['utilisateurs']) && $_SESSION['utilisateurs'][0]['id_droits'] != 2) { ?>
                                <a href="admin.php" class="droplink">Panel administrateur</a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <button class="button-envelope">
                    <i class="fa-solid fa-envelope"></i>
                </button>
                <button role='button' class="button-card" data-target='#modal2' data-toggle='modal' id='connexion-link'>
                    <i class="fa-solid fa-cart-shopping"></i>
                </button>
            </div>
        </div>

        <!-- <div>
            <label>☰</label>
            <img src="images/IMG-1168.png" alt="logo">
        </div> -->

        <!-- <div id="icons">
            <form action="rechercheProduits.php" method="get">
                <input type="search" name="recherche" placeholder="rechercher article">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <?php if (empty($_SESSION['utilisateurs'])) { ?>
                <button role='button' data-target='#modal' data-toggle='modal' id='connexion-link'><i class="fa-solid fa-user"></i></button>
            <?php } else { ?>
                <div class="dropdown" style="float:left;">
                    <button class="dropbtn"><i class="fa-solid fa-user"></i></button>
                    <div class="dropdown-content" style="left:0;">
                        <a href="profil.php">Mon compte</a>
                        <a href="listeCommandes.php">Mes commandes</a>
                        <a href="mesFavoris.php">Ma liste d'envie</a>
                        <a href="panier.php">Mon Panier</a>
                        <a href="deconnexion.php">Me deconnecter</a>
                        <?php if (!empty($_SESSION['utilisateurs']) && $_SESSION['utilisateurs'][0]['id_droits'] != 2) { ?>
                            <a href="admin.php">Panel administrateur</a>
                        <?php } ?>
                    </div>
                </div>
                
                <?php } ?>
                <i class="fa-solid fa-envelope"></i>
                <button role='button' data-target='#modal2' data-toggle='modal' id='connexion-link'><i class="fa-solid fa-cart-shopping"></i></button>
        </div> -->

        <!-- Modal -->
        <div class="modal" id="modal" role="dialog">
            <div class="modal-content">
                <div class="modal-close" data-dismiss="dialog">X</div>
                <div class="modal-header">
                    <h3>CONNECTEZ-VOUS</h3>
                </div>
                <div class="modal-body">
                    <img src="images/IMG-1168.PNG" alt="">
                    <form action="" method="post">
                        <label>EMAIL :</label>
                        <input type="text" name="email" placeholder="email" autocomplete="off">
                        <label>Mot de passe :</label>
                        <input type="mot" name="mot_de_passe" placeholder="Mot de passe" />
                        <button type="submit" name="connection">Connexion</button>
                        <p>Vous n'avez pas de compte ? <br><a href="inscription.php">Creez un compte</a></p>
                        <a href="motdepasseoublie.php">Mot de passe oublié ?</a></p>
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
                    <li class="deroulant">
                        <a href="">Hommes</a>
                        <ul class="sous">
                            <?php foreach ($afficheHs as $afficheH) { ?>

                                <li><a href="listeProduits.php?id=<?= $afficheH['id'] ?>"><?= $afficheH['nom'] ?></a>


                                    <?php $afficheSousCategorieHommes = $afficheSousCategorie->selectSousCategorie($afficheH['id']); ?>
                                    <ul>
                                        <?php foreach ($afficheSousCategorieHommes as $afficheSousCategorieHomme) { ?>
                                            <li><a href="produits.php?id=<?= $afficheSousCategorieHomme['id'] ?>"> <?= $afficheSousCategorieHomme['nom'] ?></a> </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="deroulant">
                        <a href="">Femmes</a>
                        <ul class="sous">
                            <?php foreach ($afficheFs as $afficheF) { ?>
                                <li><a href="listeProduits.php?id=<?= $afficheF['id'] ?>"> <?= $afficheF['nom'] ?></a>
                                    <?php $afficheSousCategorieFemmes = $afficheSousCategorie->selectSousCategorie($afficheF['id']); ?>
                                    <ul>
                                        <?php foreach ($afficheSousCategorieFemmes as $afficheSousCategorieFemme) { ?>
                                            <li><a href="produits.php?id=<?= $afficheSousCategorieFemme['id'] ?>"> <?= $afficheSousCategorieFemme['nom'] ?></a></li>
                                        <?php  } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="deroulant"><a href="">Enfants</a>
                        <ul class="sous">
                            <?php foreach ($afficheEs as $afficheE) { ?>
                                <li><a href="listeProduits.php?id=<?= $afficheE['id'] ?>"> <?= $afficheE['nom'] ?></a>
                                    <?php $afficheSousCategorieEnfants = $afficheSousCategorie->selectSousCategorie($afficheE['id']); ?>
                                    <ul>
                                        <?php foreach ($afficheSousCategorieEnfants as $afficheSousCategorieEnfant) { ?>

                                            <li><a href="produits.php?id=<?= $afficheSousCategorieEnfant['id'] ?>"> <?= $afficheSousCategorieEnfant['nom'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="deroulant"><a href="">Sports</a>
                        <ul class="sous">
                            <?php foreach ($afficheSs as $afficheS) { ?>

                                <li>
                                    <a href="listeProduits.php?id=<?= $afficheS['id'] ?>"> <?= $afficheS['nom'] ?></a>
                                    <?php $afficheSousCategorieSports = $afficheSousCategorie->selectSousCategorie($afficheS['id']); ?>
                                    <ul>
                                        <?php foreach ($afficheSousCategorieSports as $afficheSousCategorieSport) { ?>
                                            <li><a href="produits.php?id=<?= $afficheSousCategorieSport['id'] ?>"> <?= $afficheSousCategorieSport['nom'] ?></a></li>
                                        <?php } ?>
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