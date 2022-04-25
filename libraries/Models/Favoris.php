<?php

    namespace Models;

    require_once('Model.php');

    class Favoris extends Model {

        protected $idUtilisateur;
        protected $idProduit;


        public function inserProduitsFavoris($idUtilisateur, $idProduit) {
            $this->idUtilisateur = $idUtilisateur;
            $this->idProduit = $idProduit;

            $sql = "INSERT INTO favoris (id_utilisateur, id_produit, etat_favoris) values (:id_utilisateur, :id_produit ,'1')";
            $favoris = $this->bdd->prepare($sql);
            $favoris->execute(array(':id_utilisateur' => $this->idUtilisateur, ':id_produit' => $this->$idProduit));
        }
    }
?>