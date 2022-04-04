<?php
    require_once('class_Model.php');
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
                $insertion = "INSERT INTO produits
                (nom, reference, classe, description, id_categorie, id_sous_categorie, prix, image1)
                VALUES (:nom, :reference, :classe, :description, :id_categorie, :id_sous_categorie, :prix, :image)";
                $result = $this->bdd->prepare($insertion);
                $result->bindValue(':nom', $nom, PDO::PARAM_STR);
                $result->bindValue(':reference', $reference, PDO::PARAM_STR);
                $result->bindValue(':classe', $classe, PDO::PARAM_STR);
                $result->bindValue(':description', $description, PDO::PARAM_STR);
                $result->bindValue(':id_categorie', $id_categorie, PDO::PARAM_INT);
                $result->bindValue(':id_sous_categorie', $id_sous_categorie, PDO::PARAM_INT);
                $result->bindValue(':prix', $prix, PDO::PARAM_STR);
                $result->bindValue(':image', $image, PDO::PARAM_STR);
                $result->execute();
            }
            catch( PDOException $Exception ) {
                // Note The Typecast To An Integer!
                var_dump($Exception);
            }
        }

        public function selection_produits( $premier, $produits_par_page){
            $selection = "SELECT * FROM produits  limit :premier, :produits_par_page";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':premier', $premier, PDO::PARAM_INT);
            $result->bindValue(':produits_par_page', $produits_par_page, PDO::PARAM_INT);
            $result->execute();
            $fetch3 = $result->fetchAll();
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
    }
?>