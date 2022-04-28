<?php
    session_start();

    require_once('../Controllers/Utilisateurs.php');

    $info = $_SESSION['utilisateurs'];
    $idUtilisateur = $_SESSION['utilisateurs'][0]['id'];

    if (!empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['codePostal']) && !empty($_POST['pays'])) {
        $modifAdresseFacturation = new \Controllers\Utilisateurs();
        $modifAdresseFacturation-> modifierAdresseFacturation($_POST['adresse'], $_POST['ville'], $_POST['codePostal'], $_POST['pays'], $idUtilisateur);
        header('Refresh: 0');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modificationDonnee.css">
    <title>Modifier Adresse Facturation</title>
</head>
<?php require_once('header.php'); ?>
    <main>
    <section id="grand-container">
        <?php require_once('navbarPanelUtilisateur.php') ?>
        <div id="container">

            <h1>MODIFIER L'ADRESSE</h1>

            <form action="" method="post">
                <h2>ADRESSE DE <span>FACTURATION</span></h2>

                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" value="<?= $info[0]['adresse'] ?>">

                <label for="ville">Ville :</label>
                <input type="text" name="ville" value="<?= $info[0]['ville'] ?>">

                <label for="codePostal">Code Postal :</label>
                <input type="text" name="codePostal" value="<?= $info[0]['code_postale'] ?>">

                <label for="pays">Pays :</label>
                <input type="text" name="pays" value="<?= $info[0]['pays'] ?>">

                <input type="submit" value="Enregistrer l'adresse">
            </form>
        </div>
    </section>
    </main>
    <?php require_once('footer.php'); ?>
</html>