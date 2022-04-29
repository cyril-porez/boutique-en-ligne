<?php

    session_start();

    $id = $_SESSION['utilisateurs'][0]['id'];


    require_once('../Controllers/Adresses.php');
    require_once('../Controllers/Utilisateurs.php');

    $adresse = new \Controllers\Adresses();
    $adressLivraison = $adresse->selectAdresses($id);

    if (!empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['codePostal']) && !empty($_POST['pays'])) {

        $modifAdresse = new \Controllers\Utilisateurs();
        $modifAdresse->modifierAdresseLivraison($_POST['adresse'], $_POST['ville'], $_POST['codePostal'], $_POST['pays'], $id);
        header('Refresh: 0');
    }

?>

<?php require_once('header.php'); ?>
    <main>
    <section id="modif">
        <?php require_once('navbarPanelUtilisateur.php') ?>
        <div id="container">

            <h1>MODIFIER L'ADRESSE</h1>

            <h2>ADRESSE DE <span>LIVRAISON</span></h2>

            <form action="" method="post">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" value="<?= $adressLivraison['adresse'] ?>">

                <label for="ville">Ville :</label>
                <input type="text" name="ville" value="<?= $adressLivraison['ville'] ?>">

                <label for="codePostal">Code Postal :</label>
                <input type="text" name="codePostal" value="<?= $adressLivraison['code_postal'] ?>">

                <label for="pays">Pays :</label>
                <input type="text" name="pays" value="<?= $adressLivraison['pays'] ?>">

                <button class="btn-submit" type="submit">Enregistrer l'adresse</button>
            </form>
        </div>
    </section>
    </main>
    <?php require_once('footer.php'); ?>