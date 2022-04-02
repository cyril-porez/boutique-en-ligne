<?php

    namespace Models;

    require_once('Model.php');
        
    class Categorie extends Model {

        public $id;
        protected $table = 'categories';
        protected $table_par_id = 'categories';
        protected $table_verif = 'categories';

        public function creer_categorie($nom){
            $creation = "INSERT INTO `categories`(`nom`) VALUES (:nom)";
            $result = $this->bdd->prepare($creation);
            $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
            $result->execute();
        }

        public function choix_produit_par_categorie($nom){
            $selection = "SELECT produits.id, produits.nom, `id_categorie` from `produits` inner join `categories` on produits.id_categorie = categories.id where categories.nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
            $result->execute();
            $fetch7 = $result->fetchAll();
            return $fetch7;
        }

        public function verif_si_existe_deja($nom){
            $selection = "SELECT nom FROM {$this->table_verif} WHERE nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
            $result->execute();
            $recupere = $result->fetchAll();
            return $recupere;
        }   
    }
?>