<?php

    namespace Controllers;

    require_once('../Models/Commandes.php');


    class Commandes {

        public function insererCommandes($reference, $prix, $prixTotal, $idProduit, $idUtilisateur, $idAdresse) {
            $inser = new \Models\Commandes;
            $inser-> inserCommandes( $reference, $prix, $prixTotal, $idProduit, $idUtilisateur, $idAdresse);
        }


        public function verifCommandeExiste($referenceCommande) {
            $verifCommande = new \Models\Commandes;
            $verif = $verifCommande->verifCommandeExiste($referenceCommande);
            return $verif;
        }

        public function supprimerPanier($idUtilisateur) {
            $supprPanier = new \Models\Panier();
            $supprPanier->supprimerPanierUtilisateur($idUtilisateur);
        }

    }
?>