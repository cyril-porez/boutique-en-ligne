<?php

    namespace Models ; 

    require_once('Model.php');

    class ProduitCommande extends Model {

        public function issererProduitCommande($num_commande, $id_produit) {
            $sql = "INSERT INTO `poduit_commandé`(`numero_Commande`, `id_produit`) VALUES (:num_commande, :id_produit)";
            $inserer = $this->bdd->prepare($sql);
            $inserer->execute(array(':num_commande' => $num_commande, ':id_produit' => $id_produit));
        }

        public function select_produit_commande($numero_commande) {
            $sql = "SELECT * from poduit_commandé inner join produits on poduit_commandé.id_produit = produits.id  where numero_Commande = :numero_commande";
            $produit_commande = $this->bdd->prepare($sql);
            $produit_commande->execute(array(':numero_commande' => $numero_commande));
            $produit = $produit_commande->fetchall(\PDO::FETCH_ASSOC);
            return $produit;
        }
    }
?>