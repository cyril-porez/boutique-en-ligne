<?php
    session_start();
    
    require_once('../Controllers/Clients.php');
    require_once('../Controllers/Adresses.php');

    if (!empty($_SESSION['utilisateurs'])) {
        $id = $_SESSION['utilisateurs'];

        $verif = new \Controllers\Adresses();
        $verifId = $verif->verifieAdresseLivraison($id[0]['id']);
        var_dump($verifId);
        if ($verifId == 0) {
            $adresse = new \Controllers\Adresses();
            $adresse->Adresse($id[0]['id']);
            //header('Refresh: 0');
        }        
    }


    var_dump($_SESSION);
    if (isset($_POST['deconnexion'])){
        session_destroy();
        header('Location: connexion.php');
    }

    
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
    
    <a href="inscription.php">Inscription</a><br>
    <a href="connexion.php">connexion</a><br>
    <a href="modifierMotDePasse.php">changer mot de passe</a><br>
    <a href="profil.php">profil</a>
    <form action="" method="post">
        <button type="submit" name="deconnexion">deConnexion</button>
    </form>
</body>
</html>