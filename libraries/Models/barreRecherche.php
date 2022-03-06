<?php

    namespace Models;
    require_once('Bdd.php');

    class barreRecherche extends Bdd {

        protected $recherche;

        public function __construct() {
           parent::__construct($this->bdd);
        }

        public function selectProduitRecherche($recherche) {
            $this->recherche = $recherche;
            $produits = $this->bdd->prepare('SELECT nom, prix, image1 from produits where nom like "%'.$this->recherche.'%" order by id desc');
            $produits->execute();
            $produit = $produits->fetchall(\PDO::FETCH_ASSOC);
            return $produit;
        }
    }
    $produit = new barreRecherche();
    $produit->selectProduitRecherche('short');
?>