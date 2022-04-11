<?php
    namespace Controllers;
    
    require_once('../Models/Admin.php');

    class Admin {

        public function selectionneUtilisateurs() {
            $utilisateurs = new \Models\Admin();
            $infoUtilisateurs = $utilisateurs->selectionneUtilisateurs();
            return $infoUtilisateurs;
        }


        public function modifierUtilisateur($id) {

        }


        public function supprimerUtilsateur($id) {

        }

        public function creerUtilisateur($nom, $prenom, $email, $mot_de_passe, $adresse, $code_postale, $pays, $ville, $num) {

        }


        public function selectionneProduits() {
            $utilisateurs = new \Models\Admin();
            $infoUtilisateurs = $utilisateurs->selectionneProduits();
            return $infoUtilisateurs;
        }
     
        

    }
?>