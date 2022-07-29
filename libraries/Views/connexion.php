<?php
    session_start();
    require_once('../autoload.php');

    if (isset($_POST['deconnexion'])){
        session_destroy();
    }
    $erreur = "";
    if (!empty($_POST['email']) && !empty($_POST['mot_de_passe'])) {
        $connex = new \Controllers\Connexion();
        $erreur = $connex->connexion();
    }
?>
       
    <?php require_once('header.php'); ?>
        <main>
            <section id="connexion">
                <img src="images/IMG-1168.png" alt="Logo Carnage">
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
            </section>
        </main>
        <?php
            require('footer.php');
        ?>
    </body>
</html> 