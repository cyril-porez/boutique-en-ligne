<?php

require_once('../Model/Utilisateur.php');

$utilisateur = new Utilisateur;

if(isset($_POST['email']) && isset($_POST['mot_de_passe']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])){

    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $recuperer = $utilisateur->connexion($email);
    if(count($recuperer) > 0){
        if(password_verify($mot_de_passe, $recuperer[0]['mot_de_passe'])){
            $_SESSION['utilisateurs'] = $recuperer;
            header('Location: ../View/index.php');
        }

    }
    else{
        echo 'utilisateurs inconnu';
        }
}
else if(isset($_POST['email'], $_POST['mot_de_passe']) && empty($_POST['email']) && empty($_POST['mot_de_passe'])){

    echo 'Le champs est vide';
}


?>