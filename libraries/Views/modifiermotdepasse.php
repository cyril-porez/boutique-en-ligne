<?php

    session_start();

    $utilisateur = $_SESSION['utilisateurs'];
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
        <h1>MODIFIER LES INFORMATIONS DU COMPTE</h1>

        <h2>INFORMATIONS DU COMPTE</h2>

        <form action="" method="post">

            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" value="<?= $utilisateur[0]['prenom'] ?>">

            <label for="nom">nom :</label>
            <input type="text" name="nom" value="<?= $utilisateur[0]['nom'] ?>" >

            <label for="email">Email :</label>
            <input type="text" name="email" value="<?= $utilisateur[0]['email'] ?>" >
        </form>
        
        <h2>CHANGER DE MOT DE PASSE </h2>

        <form action="" method="post">

            <label for="motDePasse">Mot de passe:</label>
            <input type="text" name="motDePasse">
    
            <label for="nouveauMotDePasse">Nouveau mot de passe :</label>
            <input type="text" name="nouveauMotDePasse">
    
            <label for="confirmeMotDePasse">Confirmer Mot de passe :</label>
            <input type="text" name="confirmeMotDePasse">
            <input type="submit" value="enregistrer">
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>