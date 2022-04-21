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


        public function verif_ref($reference){
            $selection = "SELECT nom FROM {$this->table_verif} WHERE nom = :reference";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':reference', $reference, \PDO::PARAM_STR);
            $result->execute();
            $recupere_ref = $result->fetchAll();
            return $recupere_ref;
        }
        
        public function inserer_produit($nom, $reference, $classe, $description, $id_categorie, $id_sous_categorie, $prix, $image){
                
            try {

                // $id_categorie = intval($id_categorie);
                $sql = "INSERT INTO produits (nom, reference, classe, description, id_categorie, id_sous_categorie, prix, image1) VALUES (:nom, :reference, :classe, :description, :id_categorie, :id_sous_categorie, :prix, :image)";
                $result = $this->bdd->prepare($sql);
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
                //var_dump($Exception);
            }
        }


        public function modifierProduit($nom, $reference, $classe, $description, $id_categorie, $id_sous_categorie, $prix, $image, $id) {
            $sql = "UPDATE produits SET nom = :nom, reference = :reference, classe = :classe, description = :description, id_categorie = :idCategorie, id_sous_categorie = :idSousCategorie, prix = :prix, image1 = :image1 WHERE id = :id";
            $result = $this->bdd->prepare($sql);
                $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
                $result->bindValue(':reference', $reference, \PDO::PARAM_STR);
                $result->bindValue(':classe', $classe, \PDO::PARAM_STR);
                $result->bindValue(':description', $description, \PDO::PARAM_STR);
                $result->bindValue(':idCategorie', $id_categorie, \PDO::PARAM_INT);
                $result->bindValue(':idSousCategorie', $id_sous_categorie, \PDO::PARAM_INT);
                $result->bindValue(':prix', $prix, \PDO::PARAM_STR);
                $result->bindValue(':image1', $image, \PDO::PARAM_STR);
                $result->bindValue(':id', $id, \PDO::PARAM_INT);
                $result->execute();
        }


        public function selection_produits($id){
            $selection = "SELECT * FROM produits where id = :id";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':id', $id, \PDO::PARAM_INT);
            $result->execute();
            $fetch3 = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $fetch3;
        }


         // determination du nombre totale de produits avec la fonction ci-dessous
         public function determination_nombre_total_de_produits(){

            $selection = "SELECT count(*) as nombre_produits from produits";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $nombre_produits = $result->fetch();
            return $nombre_produits;
        }


        public function supprimerProduit($id) {
            $sql = "DELETE FROM produits WHERE id = :id";
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue(":id", $id, \PDO::PARAM_INT);
            $requete->execute();    
        } 
    }
?>