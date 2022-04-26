<?php
    namespace Controllers;

    require_once('../Models/Stock.php');

    class Stock {

        public function verifStockQuantiteKimono($referenceProduit) {
            $verifQuantite = new \Models\Stock();
            $verifQuantiteKimono = $verifQuantite->verifQuantiteProduitTaille($referenceProduit);
            return $verifQuantiteKimono;
        }
    }
?>