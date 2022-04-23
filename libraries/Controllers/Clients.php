<?php

    namespace Controllers;
    require_once('../Models/Utilisateurs.php');

    class Clients {

        protected $mdp;
        protected $cmdp;

        public function selectUtilisateurs($id) {
            $utilisateurs = new \Models\Utilisateurs();
            $infoUtilisateurs = $utilisateurs->selectUtilisateursId($id);
            return $infoUtilisateurs;
        }


        public function selectAdresses($id) {
            $utilisateurs = new \Models\Utilisateurs();
            $infoUtilisateurs = $utilisateurs->selectAdresse($id);
            return $infoUtilisateurs;
        }


        public function Adresse($id) {
            $adresse = new \Models\Utilisateurs();
            $addresseUtilisateur = $adresse->Adresse($id);
            return $addresseUtilisateur;
        }


        public function modifierMotDePasse($mdp, $cmdp) {
            $this->mdp = $mdp;
            $this->cmdp = $cmdp;
            $erreur = "";
                
            if ($mdp == $cmdp) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $updatePassword = new \Models\User();
                $updatePassword->modifierMotDePasse($hash);
            }
            else {
                $erreur = "* Mot de passe et confirme mot de passe !";
            }
            return $erreur;
        }
    }
?>