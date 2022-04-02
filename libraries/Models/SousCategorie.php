<?php
    
    namespace Models;

    require_once('Model.php');

    class SousCategorie extends Model {
        protected $table = 'categories';
        protected $table_par_id = 'sous_categories';
        protected $table_verif = 'sous_categories';


        public function recuperation_de_donnee(){
            $selection = "SELECT * FROM {$this->table}";
            $result = $this->bdd->prepare($selection);
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


        public function creation_sous_categorie($nom, $id_categorie) {
            $creation = "INSERT INTO `sous_categories`(`nom`, `id_categorie`) VALUES (:nom, :id_categorie)";
            $result = $this->bdd->prepare($creation);
            $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
            $result->bindValue(':id_categorie', $id_categorie, \PDO::PARAM_STR);
            $result->execute();
        }


        public function choix_produit_par_sous_categorie($nom) {
            $selection = "SELECT produits.id, produits.nom, `id_sous_categorie` from `produits` inner join `sous_categories` on produits.id_sous_categorie = sous_categories.id WHERE sous_categories.nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
            $result->execute();
            $fetch5 = $result->fetchAll();
            return $fetch5;
        }
    }
?>