<?php
    class SousCategorie {

        public function __construct(){
            $bdd = new PDO("mysql:host=localhost;dbname=carnage",'root','');
            $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $this->bdd = $bdd;
            return $bdd;
        }

        public function creation_sous_categorie($nom, $id_categorie){
            $creation = "INSERT INTO `sous_categories`(`nom`, `id_categorie`) VALUES (:nom, :id_categorie)";
            $result = $this->bdd->prepare($creation);
            $result->bindValue(':nom', $nom, PDO::PARAM_STR);
            $result->bindValue(':id_categorie', $id_categorie, PDO::PARAM_STR);
            $result->execute();
        }
    
        
        public function selection_categorie(){
            $selection = "SELECT * FROM categories";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $fetch = $result->fetchAll();
            return $fetch;
        }


        public function selection_sous_categorie(){
            $selection = "SELECT * FROM sous_categories";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $fetch2 = $result->fetchAll();
            return $fetch2;
        }
    }
?>