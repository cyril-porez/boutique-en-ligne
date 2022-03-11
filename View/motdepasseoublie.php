<?php

    

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=carnage;charset=utf8', 'root', '' );        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        print "Erreur : " . $e->getMessage() . "<br>";
    }
    

    if (!empty($_POST['recupEmail'])) {
        $subject = 'Mot de passe oublié';
        $message = "Bonjour, cliquer sur le lien pour actualiser votre message : http://localhost/boutique-en-ligne/motdepasseoublie.php     ";
        $headers = 'Content-Type: text/plain; charset="UTF-8"';
        mail($_POST['recupEmail'], $subject, $message, $headers);
    }
    else if (isset($_POST['recupEmail'])) {
        echo "Une erreur est survenue";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
</head>
<body>
    <main>
        <h1>MOT DE PASSE OUBLIE</h1>
        <h3>Veuillez entrer votre adresse email ci-dessous pour recevoir un lien de réinitialisation de mot de passe.</h3>

        <form action="" method="post">
            <input type="email" name="recupEmail">
            <input type="submit" name="recup" value="Réinitialier mon mot de passe">
            <input type="submit" name="retour" value="Retour">
        </form>
    </main>
</body>
</html>