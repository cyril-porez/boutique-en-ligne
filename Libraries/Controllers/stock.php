<?php

    namespace Controllers;

    require_once('../Models/stock.php');

    class stock {

        public function __contruct() {

        }

        public function creerStockKim($a0, $A1, $A2, $a3, $a4, $a5, $c0, $c00, $c1, $c2, $c3, $c4, $referenceProduit) {
            $error = "";
            $refProduit = new \Models\stock;
            $ref = $refProduit->verifReferenceProduit($referenceProduit);
            
            if (count($ref) == 1) {               
                $creerStockKim = new \Models\stock;
                $creerStockKim->stockKimono($a0, $A1, $A2, $a3, $a4, $a5, $c0, $c00, $c1, $c2, $c3, $c4, $referenceProduit);
            }
            else {
                $error = "Aucun produit ne possède cette référence";
            }
            return $error;           
        }

        public function creerStockVetement($s, $m, $l, $xl, $xxl, $referenceProduit) {
            $error = "";
            $refProduit = new \Models\stock;
            $ref = $refProduit->verifReferenceProduit($referenceProduit);
            
            if (count($ref) == 1) {               
                $creerStockKim = new \Models\stock;
                $creerStockKim->stockVetements($s, $m, $l, $xl, $xxl, $referenceProduit);
            }
        }

        public function creerStockGant($dixOz, $douzeOz, $quatorzeOz, $seizeOz, $referenceProduit) {
            $error = "";
            $refProduit = new \Models\stock;
            $ref = $refProduit->verifReferenceProduit($referenceProduit);
            
            if (count($ref) == 1) {               
                $creerStockKim = new \Models\stock;
                $creerStockKim->stockGants($dixOz, $douzeOz, $quatorzeOz, $seizeOz, $referenceProduit);
            }
        }
    }
?>