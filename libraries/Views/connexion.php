<?php
    session_start();
    require_once("../Controllers/Connexion.php");

    if (isset($_POST['deconnexion'])){
        session_destroy();
    }
    $erreur = "";
    if (!empty($_POST['email']) && !empty($_POST['mot_de_passe'])) {
        $connex = new \Controllers\Connexion();
        $erreur = $connex->connexion();
    }
    var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/script.js" defer></script>
        <link rel="stylesheet" href="css/inscriptionConnexion.css">
        <title>Connexion</title>
    </head>
    <body>
        <?php //require('header.php');?>
        <main>
            <img src="images/IMG-1168.png" alt="">
            <h1>CONNECTEZ-VOUS</h1>
            <form action="connexion.php" method="post">
                    <label>EMAIL :</label>
                    <input type="text" name="email" placeholder="email" autocomplete="off">
                    <label>Mot de passe :</label>
                    <input type="mot" name="mot_de_passe" placeholder="Mot de passe" />
                    <button type="submit" name="connection">Connexion</button>
                    <p>Vous n'avez pas de compte ? <br><a href="inscription.php">Creez un compte</a></p>
                    <a href="#">Mot de passe oublié ?</a></p>
                    <?= $erreur; ?>
            </form>
        </main>
        <?php
            //require('footer.php');
        ?>
    </body>
</html>