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
            <form action="connexion.php" method="post">
                <fieldset>

                </fieldset>
                <button type="submit" name="connection">Connexion</button>
                <button type="submit" name="deconnexion">deConnexion</button>
                <p>Vous n'avez pas de compte? <br><a href="inscription.php">Creez un compte</a></p>
                <?= $erreur; ?>
                <div class="wrapper">
                    <a href="#modalbox">ouvrir modal</a>
                </div>

                <div id="modalbox" class="modal">
                    <div class="modalcontent">
                        <h1>connexion</h1>
                        <legend>Connectez-vous juste ici</legend>
                        <label>EMAIL :</label>
                            <input type="text" name="email" placeholder="email" autocomplete="off">
                        <label>Mot de passe :</label>
                        <input type="mot" name="mot_de_passe" placeholder="Mot de passe" />
                        <a href="#" class="modal-close">&times;</a>
                    </div>
                </div>
            </form>
        </main>
        <?php 
            //require('footer.php');
        ?>
    </body>
</html>