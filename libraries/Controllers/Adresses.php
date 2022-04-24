<?php

    namespace Controllers;

    require_once('../Models/Adresses.php');

    class Adresses {

        public function verifieAdresseLivraison($idUtilisateur) {
            $adresse = new \Models\Adresses();
            $verifAdresse = $adresse->selectCountLogin($idUtilisateur);
            return $verifAdresse;
        }
    }
?>