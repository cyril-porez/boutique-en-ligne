<?php

    namespace Models; 

    require_once('Model.php');
    
    class Produits extends Model{

        public $id;
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
            catch( \PDOException $Exception ) {
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

        public function verif_si_existe_deja_ref($reference){
            $selection = "SELECT nom FROM {$this->table_verif} WHERE nom = :reference";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':reference', $reference, \PDO::PARAM_STR);
            $result->execute();
            $recupere_ref = $result->fetchAll();
            return $recupere_ref;
        }
    }
?>