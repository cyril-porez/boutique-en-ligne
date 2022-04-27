<?php
    namespace Controllers;

    require_once('../Models/Panier.php');

    class Panier {
        protected $idUtilisateur;

        public function panierUtilisateur() {
            $idUtilisateur = $_SESSION['utilisateurs'][0]['id'];
            $this->idUtilisateur = $idUtilisateur;
            $panier = new \Models\Panier();
            $panierUtilisateur = $panier->panierUtilisateur($idUtilisateur);
            return $panierUtilisateur;
        }
    }
?>