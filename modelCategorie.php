<?php
    class Categorie {

        public function __construct(){
            $bdd = new PDO("mysql:host=localhost;dbname=carnage",'root','');
            $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $this->bdd = $bdd;
            return $bdd;
        }

        public function creer_categorie($nom){
            $creation = "INSERT INTO `categories`(`nom`) VALUES (:nom)";
            $result = $this->bdd->prepare($creation);
            $result->bindValue(':nom', $nom, PDO::PARAM_STR);
            $result->execute();
        }

        public function selection_categorie(){
            $selection = "SELECT * FROM categories";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $fetch = $result->fetchAll();
            return $fetch;
        }

        public function choix_produit_par_categorie($nom){
            $selection = "SELECT produits.id, produits.nom, `id_categorie`
            from `produits` inner join `categories` on produits.id_categorie = categories.id
            where categories.nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, PDO::PARAM_STR);
            $result->execute();
            $fetch7 = $result->fetchAll();
            return $fetch7;
        }

        public function selection_categorie_nom($id){
            $selection = "SELECT * FROM categories WHERE id = :id";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':id', $id, PDO::PARAM_INT);
            $result->execute();
            $fetch8 = $result->fetchAll();
            return $fetch8;
        }

        public function verif_nom_categories($nom){
            $selection = "SELECT nom FROM categories WHERE nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, PDO::PARAM_STR);
            $result->execute();
            $recupere = $result->fetchAll();
            return $recupere;
        }
    }
?>