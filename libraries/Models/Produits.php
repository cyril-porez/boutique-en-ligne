<?php

    namespace Models;

    require_once("Model.php");

    class Produits extends Model {

        protected $id;
        public $nom;
        public $reference;
        public $classe;
        public $description;
        public $id_categorie;
        public $id_sous_categorie;
        public $prix;
        public $image;
        protected $table = 'categories';
        protected $table_deux = 'sous_categories';
        protected $table_par_id = 'produits';
        protected $table_verif = 'produits';

        public function recuperation_de_donnee() {
            $selection = "SELECT * FROM {$this->table}";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $recuperer_tout = $result->fetchAll();
            return $recuperer_tout;
        }


        public function recuperation_de_donnee2(){
            $selection = "SELECT * FROM {$this->table_deux}";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $recuperer_tout = $result->fetchAll();
            return $recuperer_tout;
        }


        public function recuperation_par_id($id){
            $selection = "SELECT * FROM {$this->table_par_id} WHERE id = :id";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':id', $id, \PDO::PARAM_INT);
            $result->execute();
            $recuperer_tout = $result->fetchAll();
            return $recuperer_tout;
        }


        public function verif_si_existe_deja($nom){
            $selection = "SELECT nom FROM {$this->table_verif} WHERE nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
            $result->execute();
            $recupere = $result->fetchAll();
            return $recupere;
        }
        
        public function inserer_produit($nom, $reference, $classe, $description, $id_categorie, $id_sous_categorie, $prix, $image){

            try {
                // $id_categorie = intval($id_categorie);
                $insertion = "INSERT INTO produits (nom, reference, classe, description, id_categorie, id_sous_categorie, prix, image1) VALUES (:nom, :reference, :classe, :description, :id_categorie, :id_sous_categorie, :prix, :image)";
                $result = $this->bdd->prepare($insertion);
                $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
                $result->bindValue(':reference', $reference, \PDO::PARAM_STR);
                $result->bindValue(':classe', $classe, \PDO::PARAM_STR);
                $result->bindValue(':description', $description, \PDO::PARAM_STR);
                $result->bindValue(':id_categorie', $id_categorie, \PDO::PARAM_INT);
                $result->bindValue(':id_sous_categorie', $id_sous_categorie, \PDO::PARAM_INT);
                $result->bindValue(':prix', $prix, \PDO::PARAM_STR);
                $result->bindValue(':image', $image, \PDO::PARAM_STR);
                $result->execute();
            }
            catch( PDOException $Exception ) {
                // Note The Typecast To An Integer!
                var_dump($Exception);
            }
        }


        public function selection_produits(){
            $selection = "SELECT * FROM produits";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $fetch3 = $result->fetchAll();
            return $fetch3;
        }
    }
?>