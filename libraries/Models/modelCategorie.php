<?php
    require_once('class_Model.php');

    class Categorie extends Model {

        public $id;
        protected $table = 'categories';
        protected $table_par_id = 'categories';
        protected $table_verif = 'categories';

        public function creer_categorie($nom){
            $creation = "INSERT INTO `categories`(`nom`) VALUES (:nom)";
            $result = $this->bdd->prepare($creation);
            $result->bindValue(':nom', $nom, PDO::PARAM_STR);
            $result->execute();
        }

        public function choix_produit_par_categorie($nom, $premier, $produits_par_page){
            $selection = "SELECT produits.id, produits.nom, `id_categorie`
            from `produits` inner join `categories` on produits.id_categorie = categories.id
            where categories.nom = :nom limit :premier, :produits_par_page";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, PDO::PARAM_STR);
            $result->bindValue(':premier', $premier, PDO::PARAM_INT);
            $result->bindValue(':produits_par_page', $produits_par_page, PDO::PARAM_INT);
            $result->execute();
            $fetch7 = $result->fetchAll();
            return $fetch7;
        }

         // determination du nombre totale de produits avec la fonction ci-dessous
         public function determination_nombre_total_de_produits_categories($id_categorie){
            $selection = "SELECT count(*) as nombre_produits from produits inner join categories on
            id_categorie = categories.id where id_categorie = $id_categorie";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $nombre_produits = $result->fetch();
            return $nombre_produits;
        }
    }
?>