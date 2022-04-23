<?php

    namespace Controllers;

    require_once('../Models/Utilisateurs.php');
    require_once('../Controllers/Utilisateurs.php');

    class Clients extends Utilisateurs {


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
    }
?>