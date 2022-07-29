<?php

    use PHPMAILER\PHPMAILER\PHPMAILER;
    use PHPMAILER\PHPMAILER\EXCEPTION;
    use PHPMailer\PHPMailer\SMTP;

    require_once "vendor/phpmailer/phpmailer/src/Exception.php";
    require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require_once "vendor/phpmailer/phpmailer/src/SMTP.php";

    //require 'PHPMailerAutoload.php';
    require 'vendor/autoload.php';
    $mail = new PHPMAILER();

    $date = date('Y-m-d H:i:s');

        $bdd = new PDO("mysql:host=localhost;dbname=carnage", "root", "");
        // set the PDO error mode to exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/motdepasseoublié.css">
    <title>Mot de passe oublié</title>
</head>
<body>
    <main>
        <header>
            <?php
                require_once('header.php')
            ?>
        </header>
        <h1>MOT DE PASSE OUBLIE</h1>
        <h3>Veuillez entrer votre adresse email ci-dessous pour recevoir un lien de réinitialisation de mot de passe.</h3>

        <form action="" method="post">
            <input type="email" name="recupEmail">
            <input type="submit" name="recup" value="Réinitialier mon mot de passe">
            <input type="submit" name="retour" value="Retour">
        </form>
        <?php
            if (!empty($_POST['recupEmail'])) {
                $token = uniqid();
                $url = "http://localhost/boutique-en-ligne/libraries/Views/nouveauMotdepasse?token=$token";
                $email = $_POST['recupEmail'];
                $recupEmail = $bdd->prepare("SELECT email from utilisateurs WHERE email = '$email'");
                $recupEmail->execute();
                $existe = $recupEmail->rowcount();

                if ($existe > 0) {

                    try {

                        $modifToken = $bdd->prepare("UPDATE utilisateurs SET token = '$token', date = '$date' WHERE email = '$email'");
                        $modifToken->execute();


                        //Configuration
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // information de debug

                        //Configuration SMTP
                        $mail->isSMTP();
                        $mail->Host = "smtp.gmail.com";
                        $mail->SMTPAuth = "true";
                        $mail->Username = 'cyril.porez@laplateforme.io';   //SMTP username
                        $mail->Password = 'Hokuto1989';            //SMTP mot de passe
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = 587;

                        //Charset
                        $mail->CharSet = "utf-8";

                        //destinataire
                        $mail->addAddress($email);

                        //Epéditeur
                        $mail->setFrom('cyrilporez@gmail.com');

                        $mail->Subject = 'Mot de passe oublié';
                        $mail->Body = "Bonjour, Voici votre lien pour la réinitialisation du mot de passe : $url";

                        //envoie du mail
                        $mail->send();
                        echo "<p>Le mail a bien été envoyé. Veuillez vérifier votre boîte mail afin de changer votre mot de passe !</p>";
                    }
                    catch(Exception $e) {
                        echo "<p>Message non envoyé error: {$mail->ErrorInfo}</p>";
                    }
                }
                else {
                    echo "<p>Ce mail erreur</p>";
                }
            }
            else if (isset($_POST["recupEmail"])) {
                echo "<p>le champ est vide !</p>";
            }
        ?>
    </main>
    <footer>
        <?php
            require_once('footer.php');
        ?>
    </footer>
</body>
</html>