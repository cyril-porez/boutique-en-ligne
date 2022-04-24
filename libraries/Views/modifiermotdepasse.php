<?php

    session_start();

    require_once('../Controllers/Utilisateurs.php');

    $utilisateur = $_SESSION['utilisateurs'];
    var_dump($_SESSION['utilisateurs']);    

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modificationDonnee.css">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <section id="grand-container">
            <section id="nav">
                <ul>
                    <li><a href="profil.php">Mon profil</a></li>
                    <li><a href="modifierMotDePasse.php">Modifier changer de mot de passe</a></li>
                    <li><a href="modifierAdresseFacturation.php">Modifier l'adresse de facturation</a></li>
                    <li><a href="modifierAdresseLivraison.php">Modifier l'adresse de livraison</a></li>
                    <li><a href="#">Mes commandes</a></li>
                    <li><a href="#">Ma liste d'envies</a></li>
                </ul>
            </section>
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
    <footer>

    </footer>
</body>
</html>