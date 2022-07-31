<?php

    namespace Controllers;

    require_once('../autoload.php');


    class Commandes {

        public function insererCommandes($reference, $idUtilisateur) {
            $inser = new \Models\Commandes;
            $inser-> inserCommandes( $reference, $idUtilisateur);
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

        public function afficheHistorique($idUtilisateur) {
            $afficheHistorique = new \Models\Commandes();
            $historique = $afficheHistorique->historiqueCommandes($idUtilisateur);
            return $historique;
        }

    }
?>