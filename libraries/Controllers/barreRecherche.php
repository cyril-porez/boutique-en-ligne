<?php

   
    namespace Controllers;

    require_once('../autoload.php');


    class barreRecherche {

        protected $recherche;

        public function rechercheProduits($recherche) {
            $this->recherche = $recherche;

            $rechercheProduits = new \Models\barreRecherche();
            return $rechercheProduits->selectProduitRecherche($this->recherche);
        }
    }
?>