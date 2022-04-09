<?php
    namespace Controllers;
    
    require_once('../Models/Admin.php');

    class Admin {

        public function selectionneUtilisateurs() {
            $utilisateurs = new \Models\Admin();
            $infoUtilisateurs = $utilisateurs->selectionneUtilisateurs();
            return $infoUtilisateurs;
        }
     
        

    }
?>