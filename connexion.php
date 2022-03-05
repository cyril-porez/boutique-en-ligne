<?php

require_once("Controller/userController.php");


session_start();



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/form.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <title>Connexion</title>
    </head>
    <body>
        <?php //require('header.php');?>
        <main>
            <form action="" method="post">
                <fieldset>
                    <legend>Connectez-vous juste ici</legend>
                    <label>EMAIL :</label>
                    <input type="text" name="email" placeholder="email" autocomplete="off">
                    <label>Mot de passe :</label>
                    <input type="mot" name="mot_de_passe" placeholder="Mot de passe" />
                   
                </fieldset>
                <button type="submit" name="connection">Connexion</button>
                <p>Vous n'avez pas de compte? <br><a href="register.php">Creez un compte</a></p>
            </form>
        </main>
        <?php //require('footer.php');?>
    </body>
</html>