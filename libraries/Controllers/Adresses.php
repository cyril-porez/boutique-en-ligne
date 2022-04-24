<?php

    namespace Controllers;

    require_once('../Models/Adresses.php');

    class Adresses {

        public function verifieAdresseLivraison($idUtilisateur) {
            $adresse = new \Models\Adresses();
            $verifAdresse = $adresse->selectCountLogin($idUtilisateur);
            return $verifAdresse;
        }

        public function selectAdresses($id) {
            $utilisateurs = new \Models\Adresses();
            $infoUtilisateurs = $utilisateurs->selectAdresse($id);
            return $infoUtilisateurs;
        }
    }

    $adresse = new \Controllers\Adresses();
    var_dump($adresse->selectAdresses(1));
?>