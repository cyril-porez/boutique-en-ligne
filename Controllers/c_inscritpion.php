<?php

require_once("../Model/Utilisateur.php");

$utilisateur = new Utilisateur();
// if (isset($_POST['register'])){
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['adresse']) &&
        !empty($_POST['code_postale']) && !empty($_POST['pays']) && !empty($_POST['ville']) && !empty($_POST['numero'])){

                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);
                $mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);
                $confMotDePasse = htmlspecialchars($_POST['Cmdp']);
                $adresse = htmlspecialchars($_POST['adresse']);
                $codePostale = htmlspecialchars($_POST['code_postale']);
                $pays = htmlspecialchars($_POST['pays']);
                $ville = htmlspecialchars($_POST['ville']);
                $numero = htmlspecialchars($_POST['numero']);

                $recupere = $utilisateur->verif_si_existe_deja($email);
                if($mot_de_passe == $confMotDePasse){

                        $mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);

                        if(count($recupere) == 0){

                                $utilisateur->register($nom, $prenom, $email, $mot_de_passe, $adresse, $codePostale, $pays, $ville, $numero);
                        }
                        else{
                                echo "compte deja existant avec cette email";
                        }

                }
                else{
                        echo "les mots de passe ne sont pas identique";
                }
        }
        elseif (isset($_POST['nom']) || isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mot_de_passe']) && isset($_POST['adresse']) &&
        isset($_POST['code_postale']) || isset($_POST['pays']) || isset($_POST['ville']) || isset($_POST['numero'])){
                echo "un ou plusieurs champs sont vides";
        }

// }





