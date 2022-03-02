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
    }
?>