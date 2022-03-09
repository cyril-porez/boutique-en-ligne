<?php

require_once('./Model/Utilisateur.php');

$utilisateur = new Utilisateur;

if(isset($_POST['email']) && isset($_POST['mot_de_passe']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])){

    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $utilisateur->connexion($email,$mot_de_passe);

}

if(empty($email) || empty($mot_de_passe)){

    echo 'Le champs est vide';
}


?>