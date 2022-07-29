<?php 

    namespace Controllers;

    require_once('../autoload.php');
    
    class Pagination {

        public function pagination() {

            $produits = new \Models\Produits;
            $sous_categorie = new \Models\SousCategorie;
            $categorie = new \Models\Categorie;
        
            //  on determine sur quelle page on se trouve
        
            if(!empty($_GET['page'])){
                $pageCourante = (int) htmlspecialchars($_GET['page']); 
            }
            else{
                $pageCourante = 1;
            }
        
        
            // dans mon model Produit je determine le nombre totale de produits
            $nombre_produits = $produits->determination_nombre_total_de_produits();
        
            // determination du nombre de produits par page
            $produits_par_page = 5;
        
            //  calcul du nombre de page totale/ la fonction "ceil" permet d'arrondir a l'entier supèrieur
            $pages = ceil($nombre_produits[0] / $produits_par_page);
        
            //  calcul du premier produit de chaque page
        
            $premier = ($pageCourante * $produits_par_page) - $produits_par_page;
            // ------------------------------------------------------------------------
            // $fetch = $produits->recuperation_de_donnee();
            // $fetch2 = $produits->recuperation_de_donnee2();
            // $fetch3 = $produits->selection_produits();

        }

    }

?>