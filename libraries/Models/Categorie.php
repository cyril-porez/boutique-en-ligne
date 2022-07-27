<?php

    namespace Models;

    require_once('Model.php');
        
    class Categorie extends Model {

        public $id;
        protected $table = 'categories';
        protected $table_par_id = 'categories';
        protected $table_verif = 'categories';

        public function creer_categorie($nom, $genre){
            $creation = "INSERT INTO categories (nom, genre) VALUES (:nom, :genre)";
            $result = $this->bdd->prepare($creation);
            $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
            $result->bindValue(':genre', $genre, \PDO::PARAM_STR);
            $result->execute();
        }

        public function selectCategorie() {
            $sql = "SELECT * from categories order by id asc";
            $categorie = $this->bdd->prepare($sql);
            $categorie->execute();
            $categories = $categorie->fetchall(\PDO::FETCH_ASSOC);
            return $categories;
        }

        public function selectCategorieH() {
            $sql = "SELECT * from categories where genre = 'Homme'";
            $categorie = $this->bdd->prepare($sql);
            $categorie->execute();
            $categorieHomme = $categorie->fetchall(\PDO::FETCH_ASSOC);
            return $categorieHomme;
        }


        public function selectCategorieS() {
            $sql = "SELECT * from categories where genre = 'Sport'";
            $categorie = $this->bdd->prepare($sql);
            $categorie->execute();
            $categorieSport = $categorie->fetchall(\PDO::FETCH_ASSOC);
            return $categorieSport;
        }

        public function selectCategorieF() {
            $sql = "SELECT * from categories where genre = 'Femme'";
            $categorie = $this->bdd->prepare($sql);
            $categorie->execute();
            $categorieFemme = $categorie->fetchall(\PDO::FETCH_ASSOC);
            return $categorieFemme;
        }

        public function selectCategorieE() {
            $sql = "SELECT * from categories where genre = 'Enfant'";
            $categorie = $this->bdd->prepare($sql);
            $categorie->execute();
            $categorieEnfant = $categorie->fetchall(\PDO::FETCH_ASSOC);
            return $categorieEnfant;
        }


        public function choix_produit_par_categorie($id){
            $selection = "SELECT produits.id, produits.nom, produits.reference, produits.classe, produits.description, produits.id_categorie, produits.id_sous_categorie, produits.prix, produits.image1 from produits inner join categories on produits.id_categorie = categories.id where categories.id = :id";
            $result = $this->bdd->prepare($selection);
            $result->execute(array(':id' => $id));
            $fetch7 = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $fetch7;
        }

        public function verif_si_existe_deja($nom){
            $selection = "SELECT nom FROM {$this->table_verif} WHERE nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->execute(array(':nom' => $nom));
            $recupere = $result->fetchAll();
            return $recupere;
        }
        
        public function supprimerCategorie($id) {
            $sql = "DELETE FROM categories WHERE id = :id";
            $requete = $this->bdd->prepare($sql);
            $requete->execute(array(':id' => $id));    
        } 


        public function modifierCategorie($nom, $genre, $id) {
            $sql = "UPDATE categories SET nom = :nom, genre = :genre WHERE id = :id";
            $requete = $this->bdd->prepare($sql);
            var_dump($nom);
            return $requete->execute(array(':id' => $id, ':genre' => $genre, ':nom' => $nom));            
        }
    }
?>