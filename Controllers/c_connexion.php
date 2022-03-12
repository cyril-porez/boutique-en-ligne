<?php

    require_once('../Model/Utilisateur.php');

    $utilisateur = new Utilisateur;

    if(isset($_POST['email']) && isset($_POST['mot_de_passe']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])){

        $email = htmlspecialchars($_POST['email']);
        $mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);

        $recuperer = $utilisateur->connexion($email);
        if(count($recuperer) > 0){
            if(password_verify($mot_de_passe, $recuperer[0]['mot_de_passe'])){
                $_SESSION['utilisateurs'] = $recuperer;
                header('Location: ../View/index.php');
            }

        }
        else{
            echo "L'email ou le mot de passe ne correspond pas";
        }
    }
    else if(isset($_POST['email']) || isset($_POST['mot_de_passe'])){
        echo '* Un des champ est vide';
    }
?>