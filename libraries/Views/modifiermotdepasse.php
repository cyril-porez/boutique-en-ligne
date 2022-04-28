<?php

    session_start();

    require_once('../Controllers/Utilisateurs.php');

    $utilisateur = $_SESSION['utilisateurs'];

    if(!empty($_POST['motDePasse']) && !empty($_POST['nouveauMotDePasse']) && !empty($_POST['confirmeMotDePasse'])) {
        $modifMdp = new \Controllers\Utilisateurs();
        $modifMdp->modifierMotDePasse();
    }

    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email'])) {
        $modifInfo = new \Controllers\Utilisateurs();
        $modifInfo->modifierUtilisateurs($_POST['nom'], $_POST['prenom'], $_POST['email']);
        header("Refresh: 0");
    }
?>

<?php require_once('header.php'); ?>
    <main>
        <section id="modif">
            <?php require_once('navbarPanelUtilisateur.php') ?>
            <div id="container">
                <h1>MODIFIER LES INFORMATIONS DU COMPTE</h1>
                <h2>INFORMATIONS DU COMPTE</h2>
                <form action="" method="post">

                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" value="<?= $utilisateur[0]['prenom'] ?>">

                    <label for="nom">nom :</label>
                    <input type="text" name="nom" value="<?= $utilisateur[0]['nom'] ?>" >

                    <label for="email">Email :</label>
                    <input type="text" name="email" value="<?= $utilisateur[0]['email'] ?>" >

                    <h2>CHANGER DE MOT DE PASSE </h2>



                    <label for="motDePasse">Mot de passe :</label>
                    <input type="text" name="motDePasse">

                    <label for="nouveauMotDePasse">Nouveau mot de passe :</label>
                    <input type="text" name="nouveauMotDePasse">

                    <label for="confirmeMotDePasse">Confirmer Mot de passe :</label>
                    <input type="text" name="confirmeMotDePasse">

                    <input type="submit" value="enregistrer">
                </form>
            </div>
        </section>
    </main>
    <?php require_once('footer.php'); ?>