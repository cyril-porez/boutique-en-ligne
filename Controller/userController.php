<?php 

require_once("Model/Utilisateur.php");

$utilisateur = new Utilisateur();

if(isset($_POST['register'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $codePostale = intval($_POST['code_postale']);
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $confMotDePasse = $_POST['Cmdp'];

    $utilisateur->register($nom,$prenom,
                        $email,$mot_de_passe,
                        $adresse,$codePostale,
                        $pays,$ville,
                        $numero);

};


if(isset($_POST['connection']))
{
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $utilisateur->connexion($email,$motDepasse);
}

