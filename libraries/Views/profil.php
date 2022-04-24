<?php
    session_start();

    require_once('../Controllers/Adresses.php');

    $info = $_SESSION['utilisateurs'];

    $adresse = new \Controllers\Adresses();
    $adresseUtilisateurs = $adresse->selectAdresses($info[0]['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profil.css">
    <title>Mon compte</title>
</head>
<body>
    <header>

    </header>
    <main>
        <section id="grand-container">
            <section id="nav">
                <ul>
                    <li><a href="profil.php">Mon profil</a></li>
                    <li><a href="modifierMotDePasse.php">Modifier mes informations ou mon mot de passe</a></li>
                    <li><a href="modifierAdresseFacturation.php">Modifier l'adresse de facturation</a></li>
                    <li><a href="modifierAdresseLivraison.php">Modifier l'adresse de livraison</a></li>
                    <li><a href="#">Mes commandes</a></li>
                    <li><a href="#">Ma liste d'envies</a></li>
                </ul>
            </section>
            <div id="container">
                <h1>MON COMPTE</h1>
                <h2>INFORMATION DU COMPTE</h2>
                <div class="parent">
                    <div class="div1">
                        <h3>INFORMATION DE CONTACT</h3>
                        <p><?= $info[0]['prenom'] . ' ' . $info[0]['nom']  ?></p>
                        <p><?= $info[0]['email'] ?></p>
                        <a href="modifierMotDePasse.php">Modifier mes informations ou mon mot de passe</a>
                    </div>
                    <div class="div2">
                        <h2>CARNET D'ADRESSES</h2>
                        <hr>
                    </div>
                    <div class="div3">
                        <h3>ADRESSE DE FACTURATION PAR DEFAUT</h3>
                        <p><?= $info[0]['prenom'] . ' ' . $info[0]['nom']  ?></p>
                        <p><?= $info[0]['adresse']  ?></p>
                        <p><?= $info[0]['ville'] . ',' . ' ' . $info[0]['code_postale']  ?></p>
                        <p><?= $info[0]['pays']  ?></p>
                        <p><?= 'Tel : ' . $info[0]['num']  ?></p>
                        <a href="modifierAdresseFacturation.php">Modifier l'adresse de facturation</a>
                    </div>

                    <div class="div4">
                        <h3>ADRESSE DE LIVRAISON PAR DEFAUT</h3>
                        <p><?= $info[0]['prenom'] . ' ' . $info[0]['nom']  ?></p>
                        <p><?= $adresseUtilisateurs['adresse'] ?></p>
                        <p><?= $adresseUtilisateurs['ville'] . ',' . ' ' . $adresseUtilisateurs['code_postal']  ?></p>
                        <p><?= $adresseUtilisateurs['pays'] ?></p>
                        <p><?= $adresseUtilisateurs['num_tel'] ?></p>
                        <a href="modifierAdresseLivraison.php">Modifier l'adresse de livraison</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>
</html>