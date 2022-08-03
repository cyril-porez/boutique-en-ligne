<?php

    $bdd = new PDO("mysql:host=localhost;dbname=carnage", "root", "");
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $token = $_GET['token']; 

    $recupDate = $bdd->prepare("SELECT date from utilisateurs where token = '$token'"); 
    $recupDate->execute();
    $recup = $recupDate->fetchall(PDO::FETCH_ASSOC);
    
    if (!empty($_POST["nouveauMotdepasse"]) && !empty($_POST["confirmeNouveauMotdepasse"])) {
        $motDepasse = $_POST["nouveauMotdepasse"];
        $confirmeMotdepasse = $_POST["confirmeNouveauMotdepasse"];
        $motDepasseHash = password_hash($motDepasse, PASSWORD_DEFAULT);
        if ($motDepasse == $confirmeMotdepasse) {
            $sql = "UPDATE utilisateurs SET mot_de_passe = '$motDepasseHash', token = 'null', date = '$dateCourante' WHERE token = '$token'";
            $nouvPasse = $bdd->prepare($sql);
            $nouvPasse->execute();
        }   
        else {
            echo "les valeurs rentrées ne correspondent pas!";
        }
    }
    else if (isset($_POST["nouveauMotdepasse"]) && isset($_POST["confirmeNouveauMotdepasse"])) {
        echo "champ vide";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/motdepasseoublié.css">
    <link rel="stylesheet" href="css/nouveauMotdePasse.css">

    <title>Nouveau Mot de passe</title>
</head>
<body>
    <main>
        <h1>DEFINIR MOT DE PASSE</h1>

        <form id="form-container" action="" method="post">
            <div id="label-password-container">
                <label for="nouveauMotdepasse">Nouveau mot de passe</label>
                <input type="password" name="nouveauMotdepasse">
            </div>

            <div id="label-password-container">
                <label for="confirmeNouveauMotdepasse">Confirme nouveau mot de passe</label>
                <input type="password" name="confirmeNouveauMotdepasse">
            </div>

            <input type="submit" value="Définir un nouveau mot de passe">
        </form>
    </main>
</body>
</html>