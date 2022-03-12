<?php 

    require_once("../Controllers/c_inscritpion.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/form.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <meta charset="UTF-8">
        <title>Inscription</title>
    </head>
    <body>
        <?php //require('header.php') ?>
        <main>
            <form action="" method="post">
                <fieldset>
                    <legend>Saisir toutes vos informations</legend>
                    <label for ="nom">NOM :</label>
                    <input id="nom" type="text" name="nom" placeholder="nom" />
                    <label for ="prenom">Prénom :</label>
                    <input id="prenom" type="text" name="prenom" placeholder="Prenom" autocomplete="off">
                    <label for ="adresse">Adresse :</label>
                    <input id="adresse" type="text" name="adresse" placeholder="adresse" autocomplete="off">
                    <label for ="codePostale">CODE POSTALE:</label>
                    <input id="code_postale" type="text" name="code_postale" placeholder="codePostale" />
                    <label for ="pays">Pays :</label>
                    <input id="pays" type="text" name="pays" placeholder="pays" />
                    <label for ="ville">Ville:</label>
                    <input id="ville" type="text" name="ville" placeholder="ville" />
                    <label for ="numero">N°:</label>
                    <input id="numero" type="text" name="numero" placeholder="numero" />
                    <label for ="email">Email :</label>
                    <input id="email" type="text" name="email" placeholder="Email" autocomplete="off">
                    <label for ="motdepasse">  Mot de passe :</label>
                    <input id="motdepasse" type="password" name="mot_de_passe" placeholder="Mot de passe" />
                    <label for ="conf-mdp">Confirmez le mot de passe :</label>
                    <input id="conf-mdp" type="password" name="Cmdp" placeholder="Confirmez le mot de passe" />
                </fieldset>
                <button type="submit" name="register">Creer un compte</button>
                <p>Vous avez déjà un compte ? <br><a href="connexion.php">Connectez vous</a></p>
            </form>
        </main>
        <?php //require('footer.php') ?>
    </body>
</html>

