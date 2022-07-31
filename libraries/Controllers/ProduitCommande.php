<?php
    namespace Controllers;

    require_once('../autoload.php');

    class ProduitCommande {

        public function insererProduitCommande($num_commande, $id_produit) {
            $inserer = new \Models\ProduitCommande();
            $inserer->issererProduitCommande($num_commande, $id_produit);
        }

        public function select_produit_commande($num_commande) {
            $produit_commande = new \Models\ProduitCommande();
            $produit = $produit_commande->select_produit_commande($num_commande);
            return $produit;
        }
    }
?>