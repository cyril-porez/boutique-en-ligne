<?php
    namespace Controllers;

    require_once('../autoload.php');

    class Panier {
        protected $idUtilisateur;

        public function panierUtilisateur() {
            $idUtilisateur = $_SESSION['utilisateurs'][0]['id'];
            $this->idUtilisateur = $idUtilisateur;
            $panier = new \Models\Panier();
            $panierUtilisateur = $panier->panierUtilisateur($idUtilisateur);
            return $panierUtilisateur;
        }


        public function contenuPanier() {
            $contenuPanier = new \Models\Panier();
            $panier = $contenuPanier->contenuPanier($_SESSION['utilisateurs'][0]['id']);
            return $panier;
        }
    }

    /*$panier = new \Controllers\Panier();
    $panier->panierUtilisateur(5    );*/
?>