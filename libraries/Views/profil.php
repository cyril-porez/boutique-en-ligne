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
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <h1>MON COMPTE</h1>
        <h2>INFORMATION DU COMPTE</h2>
        <div>
            <h3>INFORMATION DE CONTACT</h3>
            <p><?= $info[0]['prenom'] . ' ' . $info[0]['nom']  ?></p>
            <p><?= $info[0]['email'] ?></p>
            <a href="modifierMotDePasse.php">Modifier changer de mot de passe</a>
        </div>
        <h2>CARNET D'ADRESSES</h2>
        <div>
            <h3>ADRESSE DE FACTURATION PAR DEFAUT</h3>
            <p><?= $info[0]['prenom'] . ' ' . $info[0]['nom']  ?></p>
            <p><?= $info[0]['adresse']  ?></p>
            <p><?= $info[0]['ville'] . ',' . ' ' . $info[0]['code_postale']  ?></p>
            <p><?= $info[0]['pays']  ?></p>
            <p><?= 'Tel : ' . $info[0]['num']  ?></p>
            <a href="modifierAdresseFacturation.php">Modifier l'adresse de facturation</a>
        </div>
        <div>
            <h3>ADRESSE DE LIVRAISON PAR DEFAUT</h3>
            <p><?= $info[0]['prenom'] . ' ' . $info[0]['nom']  ?></p>
            <p><?= $adresseUtilisateurs['adresse'] ?></p>
            <p><?= $adresseUtilisateurs['ville'] . ',' . ' ' . $adresseUtilisateurs['code_postal']  ?></p>
            <p><?= $adresseUtilisateurs['pays'] ?></p>
            <p><?= $adresseUtilisateurs['num_tel'] ?></p>
            <a href="modifierAdresseLivraison.php">Modifier l'adresse de livraison</a>

        </div>
    </main>
    <footer>

    </footer>
</body>
</html>