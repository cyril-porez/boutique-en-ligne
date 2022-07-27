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

        public function selectSousCategorie($idCategorie) {
            $sql = "SELECT sous_categories.nom, sous_categories.id from sous_categories inner join categories on id_categorie = categories.id where id_categorie = :idCategorie";
            $categorie = $this->bdd->prepare($sql);
            $categorie->execute(array(':idCategorie' => $idCategorie));
            $categorieHomme = $categorie->fetchall(\PDO::FETCH_ASSOC);
            return $categorieHomme;
        }

        public function verif_si_existe_deja($nom){
            $selection = "SELECT nom FROM {$this->table_verif} WHERE nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->execute(array(':nom' => $nom));
            $recupere = $result->fetchAll();
            return $recupere;
        }


        public function creation_sous_categorie($nom, $id_categorie) {
            $creation = "INSERT INTO `sous_categories`(`nom`, `id_categorie`) VALUES (:nom, :id_categorie)";
            $result = $this->bdd->prepare($creation);
            $result->execute(array(':nom' => $nom, ':id_categorie' => $id_categorie));
        }


        public function choix_produit_par_sous_categorie($nom) {
            $selection = "SELECT produits.id, produits.nom, `id_sous_categorie` from `produits` inner join `sous_categories` on produits.id_sous_categorie = sous_categories.id WHERE sous_categories.nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->execute(array(':nom' => $nom));
            $fetch5 = $result->fetchAll();
            return $fetch5;
        }

        
        public function choix_produit_sous_categorie($id) {            
            $sql = "SELECT produits.id, produits.nom, produits.reference, produits.classe, produits.description, produits.id_categorie, produits.id_sous_categorie, produits.prix, produits.image1 from produits inner join sous_categories ON produits.id_sous_categorie = sous_categories.id where sous_categories.id = :id";
            $produitSousCategorie = $this->bdd->prepare($sql);
            $produitSousCategorie->execute(array(':id' => $id));
            $produits = $produitSousCategorie->fetchall(\PDO::FETCH_ASSOC);
            return $produits;
        }

        public function selectSousCategories() {
            $sql = "SELECT sous_categories.id, sous_categories.nom as sous_categorie, categories.nom as categorie from sous_categories inner join categories on sous_categories.id_categorie = categories.id";
            $categorie = $this->bdd->prepare($sql);
            $categorie->execute();
            $categories = $categorie->fetchall(\PDO::FETCH_ASSOC);
            return $categories;
        }


        public function supprimerSousCategorie($id) {
            $sql = "DELETE FROM sous_categories WHERE id = :id";
            $requete = $this->bdd->prepare($sql);
            $requete->execute(array(':id' => $id));    
        } 


        public function modifierSousCategorie($nom, $idCategorie, $id) {
            $sql = "UPDATE sous_categories SET nom = :nom, id_categorie = :id_categorie WHERE id = :id";
            $requete = $this->bdd->prepare($sql);
            return $requete->execute(array(':id' => $id, ':id_categorie' => $idCategorie, ':nom' => $nom));            
        }
    }
?>