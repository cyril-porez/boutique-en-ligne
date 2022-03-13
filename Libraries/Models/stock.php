<?php
    namespace Model;

    class stock {

        public function __construct() {

        }

        public function stockKimono() {
            $sql = "INSERT INTO stock_taille_kimono(quantite_A0, quantite_A1.5, quantite_A2, quantite_A2.5, 
            quantite_A3.5, quantite_A4, quantite_A5, quantite_C0, quantite_C00, quantite_C1, quantite_C2, 
            quantite_C3, reference_produit) VALUES ('', '', '', '', '', '', '', '', '', '', '', '', '', '')";
            $stockKim = $this->bdd->prepare($sql);
            $stockKim->execute();
        }

        public function stockVetements() {

        }

        public function stockGants() {

        }
    }
?>