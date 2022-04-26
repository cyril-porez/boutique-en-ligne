<?php
    namespace Models;

    require_once('Model.php');

    class Stock extends Model {

        public function verifQuantiteProduitTaille($referenceProduit) {
            $sql = "SELECT stock_kimono, nom_taille_kimono.nom, reference_produit from stock_taille_kimono inner join nom_taille_kimono on nom_taille_kimono.id = id_nom_taille_kimono where id_produit = :idProduit";
            $verif = $this->bdd->prepare($sql);
            $verif->execute(array(':idProduit' => $referenceProduit));
            $tailleQuantiteProduit = $verif->fetchall(\PDO::FETCH_ASSOC);
            return $tailleQuantiteProduit;
        }
    }
?>