<?php

    namespace Models;
    require_once('Model.php');

    class barreRecherche extends Model {

        protected $recherche;

        // public function __construct() {
        //    parent::__construct($this->bdd);
        // }

        public function selectProduitRecherche($recherche) {
            $this->recherche = $recherche;
            $produits = $this->bdd->prepare('SELECT id, nom, prix, image1 from produits where nom like :recherche order by id desc');
            $produits->execute(array(':recherche' => '%' . $this->recherche . '%'));
            $produit = $produits->fetchall(\PDO::FETCH_ASSOC);
            return $produit;
        }
    }
    //$produit = new barreRecherche();
   // $produit->selectProduitRecherche('short');
?>