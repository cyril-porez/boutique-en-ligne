<?php
    namespace Controllers;

    require_once('../Models/Stock.php');

    class Stock {

        public function __contruct() {

        }


        public function verifStockQuantiteKimono($referenceProduit) {
            $verifQuantite = new \Models\Stock();
            $verifQuantiteKimono = $verifQuantite->verifQuantiteProduitTaille($referenceProduit);
            return $verifQuantiteKimono;
        }

        public function creerStockKim() {
            
            if (isset($_POST['creerKim'])) {
               
                if (!empty($_POST['quantiteKim']) && !empty($_POST['refKim']) && !empty($_POST['idNomKim'])) {
                    
                    $error = "";
                    $referenceKim = htmlspecialchars($_POST['refKim']);
                    $quantite = htmlspecialchars($_POST['quantiteKim']);
                    $id = htmlspecialchars($_POST['idNomKim']);

                    $refProduit = new \Models\stock;
                    $ref = $refProduit->verifReferenceProduit($referenceKim);
                    var_dump($ref);
                    $idProduit = $ref[0]['id'];
        
                    if (count($ref) == 1) {     
                                
                        $creerStockKim = new \Models\stock;
                        $creerStockKim->stockKimono($referenceKim, $quantite, $id, $idProduit);
                    }
                    else {
                        $error = "Aucun produit ne possède cette référence";
                    }
                    return $error;
                }
            }
        }

        public function creerStockVetement() {
            
            if (isset($_POST['creerVet'])) {
              
                if (!empty($_POST['quantiteVet']) && !empty($_POST['refVet']) && !empty($_POST['idNomVet'])) {
                    
                    $error = "";
                    $referenceVet = htmlspecialchars($_POST['refVet']);
                    $quantite = htmlspecialchars($_POST['quantiteVet']);
                    $id = htmlspecialchars($_POST['idNomVet']);

                    $refProduit = new \Models\stock;
                    $ref = $refProduit->verifReferenceProduit($referenceVet);
                    $idProduit = $ref[0]['id'];
        
                    if (count($ref) == 1) {     
                        echo 'passe2';          
                        $creerStockKim = new \Models\stock;
                        $creerStockKim->stockVetements($referenceVet, $quantite, $id, $idProduit);
                    }
                    else {
                        $error = "Aucun produit ne possède cette référence";
                    }
                    return $error;
                }    
            }
        }

        public function creerStockGant() {
            
            if (isset($_POST['creerGant'])) {
                
                if (!empty($_POST['quantiteGant']) && !empty($_POST['refGant']) && !empty($_POST['idNomGant'])) {
                    
                    $error = "";
                    $referenceGant = htmlspecialchars($_POST['refGant']);
                    $quantite = htmlspecialchars($_POST['quantiteGant']);
                    $id = htmlspecialchars($_POST['idNomGant']);

                    $refProduit = new \Models\stock;
                    $refGant = $refProduit->verifReferenceProduit($referenceGant);
                    $idProduit = $refGant[0]['id'];
        
                    if (count($refGant) == 1) {     
                        echo 'passe2';          
                        $creerStockKim = new \Models\stock;
                        $creerStockKim->stockGants($referenceGant, $quantite, $id, $idProduit);
                    }
                    else {
                        $error = "Aucun produit ne possède cette référence";
                    }
                    return $error;
                }
            }
        }
    }
?>