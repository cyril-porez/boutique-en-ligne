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


        public function choix_produit_par_sous_categorie($nom){
            $selection = "SELECT produits.id, produits.nom, `id_sous_categorie`
            from `produits` inner join `sous_categories` on produits.id_sous_categorie = sous_categories.id
            WHERE sous_categories.nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, PDO::PARAM_STR);
            $result->execute();
            $fetch5 = $result->fetchAll();
            return $fetch5;
        }

        public function selection_sous_categorie_nom($id){
            $selection = "SELECT * FROM sous_categories WHERE id = :id";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':id', $id, PDO::PARAM_INT);
            $result->execute();
            $fetch6 = $result->fetchAll();
            return $fetch6;
        }

        public function verif_nom_sous_categories($nom){
            $selection = "SELECT nom FROM sous_categories WHERE nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, PDO::PARAM_STR);
            $result->execute();
            $recupere = $result->fetchAll();
            return $recupere;
        }
    }
?>