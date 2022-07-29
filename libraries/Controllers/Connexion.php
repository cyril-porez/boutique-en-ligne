<?php

    namespace Controllers;

    require_once('../autoload.php');
    require_once('function.php');

    class Connexion {

        public function connexion() {

            if (!empty($_POST['email']) && !empty($_POST['mot_de_passe'])) {

                $email = protectionDonnées($_POST['email']);
                $mot_de_passe = protectionDonnées($_POST['mot_de_passe']);
                $erreur = '';
                $utilisateur = new \Models\Utilisateurs();
                $recuperer = $utilisateur->verifEmail($email);

                if(count($recuperer) > 0) {

                    if(password_verify($mot_de_passe, $recuperer[0]['mot_de_passe'])) {

                        $_SESSION['utilisateurs'] = $recuperer;
                        header('Location: ../Views/index.php');
                    }
                }
                else{
                    $erreur =  'utilisateurs inconnu';
                }
            }
            else if (isset($_POST['email']) || isset($_POST['mot_de_passe'])) {
                $erreur = 'Le champs est vide';
            }
            return $erreur;
        }
    }
?>