<?php

    namespace Models;

    require_once("Model.php");

    class stock extends Model {

        public function __construct() {
            parent::__construct($this->bdd);    
        }

        public function verifReferenceProduit ($ref) {
            $sql = "SELECT reference from produits where reference = '$ref'";
            $refProduit = $this->bdd->prepare($sql);
            return $refProduit->excute();
        }

        public function stockKimono($a0, $a1, $a2, $a3, $a4, $a5, $c0, $c00, $c1, $c2, $c3, $c4, $refProd) {
            $sql = "INSERT INTO stock_taille_kimono(quantite_A0, quantite_A1, quantite_A2, 
            quantite_A3, quantite_A4, quantite_A5, quantite_C0, quantite_C00, quantite_C1, quantite_C2, 
            quantite_C3, quantite_C4, reference_produit) VALUES (:a0, :a1, :a2, :a3, :a4, :a5, :c0, :c00, :c1, :c2, :c3, :c4, :referenceProduit)";
            $stockKim = $this->bdd->prepare($sql);
            $stockKim->bindValue(':a0', $a0, \PDO::PARAM_INT);
            $stockKim->bindValue(':a1', $a1, \PDO::PARAM_INT);
            $stockKim->bindValue(':a2', $a2, \PDO::PARAM_INT);
            $stockKim->bindValue(':a3', $a3, \PDO::PARAM_INT);
            $stockKim->bindValue(':a4', $a4, \PDO::PARAM_INT);
            $stockKim->bindValue(':a5', $a5, \PDO::PARAM_INT);
            $stockKim->bindValue(':c0', $c0, \PDO::PARAM_INT);
            $stockKim->bindValue(':c00', $c00, \PDO::PARAM_INT);
            $stockKim->bindValue(':c1', $c1, \PDO::PARAM_INT);
            $stockKim->bindValue(':c2', $c2, \PDO::PARAM_INT);
            $stockKim->bindValue(':c3', $c3, \PDO::PARAM_INT);
            $stockKim->bindValue(':c4', $c4, \PDO::PARAM_INT);
            $stockKim->bindValue(':referenceProduit', $refProd, \PDO::PARAM_STR);

            return $stockKim->execute();
        }

        public function stockVetements() {

        }

        public function stockGants() {

        }
    }
?>