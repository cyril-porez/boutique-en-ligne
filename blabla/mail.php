<?php

    use PHPMAILER\PHPMAILER\PHPMAILER;
    use PHPMAILER\PHPMAILER\EXCEPTION;
    use PHPMailer\PHPMailer\SMTP;

    require_once "vendor/phpmailer/phpmailer/src/Exception.php";
    require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require_once "vendor/phpmailer/phpmailer/src/SMTP.php";

    //require 'PHPMailerAutoload.php';
    require 'vendor/composer/ClassLoader.php';
    $mail = new PHPMAILER();

    try {

        //Configuration
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // information de debug

        //Configuration SMTP
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = "true";
        $mail->Username = 'cyrilporez@gmail.com';   //SMTP username
        $mail->Password = 'Hokuto1989@'; 
        //$mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Charset
        $mail->CharSet = "utf-8"; 

        //destinataire
        $mail->addAddress("cyril.porez@laplateforme.io");

        //Epéditeur 
        $mail->setFrom("cyrilporez@gmail.com");
        
        $mail->Subject = 'Mot de passe oublié';
        $mail->Body = "Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                       Officia quisquam quae quos pariatur quam unde, quod repellendus! 
                       Adipisci mollitia aperiam cumque repudiandae sit nam porro quibusdam rerum. 
                       Voluptates, provident corporis.";

        //envoie du mail
        $mail->send();
        echo "msg envoyé";
    }
    catch(Exception) {
        echo "Message non envoyé error: {$mail->ErrorInfo}"; 
    }
?>