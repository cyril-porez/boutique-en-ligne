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
            $favoris->execute(array(':id_utilisateur' => $this->idUtilisateur, ':id_produit' => $this->idProduit));
        }

        public function verifProduitFavoris($idUtilisateur, $idProduit) {
            $this->idUtilisateur = $idUtilisateur;
            $this->idProduit = $idProduit;
            
            $sql = "SELECT count(etat_favoris) as nbr_favoris from favoris where id_produit = :idProduit and id_utilisateur = :idUtilisateur and etat_favoris = '1'";
            $verif = $this->bdd->prepare($sql);            
            $verif->execute(array(':idUtilisateur' => $this->idUtilisateur, ':idProduit' => $this->idProduit));
            $nbrProduitFavoris = $verif->fetchall(\PDO::FETCH_ASSOC);
            return $nbrProduitFavoris;
        } 


        public function supprimerProduitFavoris($idUtilisateur, $idProduit) {
            $this->idUtilisateur = $idUtilisateur;
            $this->idProduit = $idProduit;

            $sql = "DELETE from favoris where id_produit = :idProduit  and id_utilisateur = :idUtilisateur and etat_favoris = '1'";
            $supprimerProduitFavoris = $this->bdd->prepare($sql);            
            $supprimerProduitFavoris->execute(array(':idUtilisateur' => $this->idUtilisateur, ':idProduit' => $this->idProduit));
        }


        public function afficherProduitFavoris($idUtilisateur) {
            /*limit $nbr_article_par_page OFFSET $page*/
            $this->idUtilisateur = $idUtilisateur;

            $sql = "SELECT produits.id, produits.nom, reference, classe, description, prix, image1  from produits inner join favoris on favoris.id_produit = produits.id where favoris.id_utilisateur = :idUtilisateur order by id desc ";
            $afficheProduit = $this->bdd->prepare($sql);
            $afficheProduit->execute(array(':idUtilisateur' => $this->idUtilisateur));
            $produitsFavoris = $afficheProduit->fetchall(\PDO::FETCH_ASSOC);
            return $produitsFavoris;
        }
    }
?>