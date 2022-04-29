<?php

    namespace Controllers;

    require_once('../Models/Commandes.php');


    class Commandes {

        public function insererCommandes($reference, $prix, $prixTotal, $idProduit, $idUtilisateur, $idAdresse,$nom, $adresse, $code_postal, $image) {
            $inser = new \Models\Commandes;
            $inser-> inserCommandes( $reference, $prix, $prixTotal, $idProduit, $idUtilisateur, $idAdresse, $nom, $adresse, $code_postal, $image);
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