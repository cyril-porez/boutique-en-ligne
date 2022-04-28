<?php
    namespace Models;

    require_once('Model.php');

    class Stock extends Model {

       

        public function verifQuantiteProduitTaille($referenceProduit) {
            $sql = "SELECT stock_kimono, nom_taille_kimono.nom, nom_taille_kimono.id, reference_produit from stock_taille_kimono inner join nom_taille_kimono on nom_taille_kimono.id = id_nom_taille_kimono where id_produit = :idProduit";
            $verif = $this->bdd->prepare($sql);
            $verif->execute(array(':idProduit' => $referenceProduit));
            $tailleQuantiteProduit = $verif->fetchall(\PDO::FETCH_ASSOC);
            return $tailleQuantiteProduit;
        }



        public function verifReferenceProduit ($ref) {
            $sql = "SELECT reference, id from produits where reference = '$ref'";
            $refProduit = $this->bdd->prepare($sql);
            $refProduit->execute();
            $recupRef = $refProduit->fetchall();
            return $recupRef;
        }

        public function stockKimono($reference, $stock, $id, $idProduit) {
            $sql = "INSERT INTO stock_taille_kimono (reference_produit, stock_kimono, id_nom_taille_kimono, id_produit) VALUES (:reference, :stockKimono, :idNomTailleKim, :idProduit)";
            $stockKim = $this->bdd->prepare($sql);      
            return $stockKim->execute(array(':reference' => $reference, ':stockKimono' => $stock, ':idNomTailleKim' => $id, ':idProduit' => $idProduit));
        }

        public function stockVetements($reference, $stock, $id, $idProduit) {
            $sql = "INSERT INTO stock_taille_vetements(reference_produit, stock_vetements, id_nom_taille_vetement, id_produit) VALUES (:reference, :stockVetements, :nomTailleVetement, :idProduit)";
            $stockVet = $this->bdd->prepare($sql);            
            return $stockVet->execute(array(':reference' => $reference , ':stockVetements' => $stock, ':nomTailleVetement' => $id, ':idProduit' => $idProduit));
        }

        public function stockGants($reference, $stock, $id, $idProduit) {
            $sql = "INSERT INTO `stock_taille_gants`(reference_produit, stock_gant, id_nom_taille_gant, id_produit) VALUES (:reference, :stockGant, :nomTailleGant, :idProduit)";
            $stockGants = $this->bdd->prepare($sql);            
            return $stockGants->execute(array(':reference' => $reference , ':stockGant' => $stock, ':nomTailleGant' => $id, ':idProduit' => $idProduit));
        }
    }
?>