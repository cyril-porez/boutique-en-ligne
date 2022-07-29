<?php

    namespace Controllers;

    require_once('../autoload.php');

    class Clients extends Utilisateurs {


        public function selectUtilisateurs($id) {
            $utilisateurs = new \Models\Utilisateurs();
            $infoUtilisateurs = $utilisateurs->selectUtilisateursId($id);
            return $infoUtilisateurs;
        }
    }
?>