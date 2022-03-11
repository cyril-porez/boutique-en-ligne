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
    public function selection_produits(){
        $selection = "SELECT * FROM produits";
        $result = $this->bdd->prepare($selection);
        $result->execute();
        $fetch3 = $result->fetchAll();
        return $fetch3;
    }

    public function j_aime($id_produit){
        $insertion = "INSERT INTO `j_aime_deteste`(`j_aime`, `deteste`, `id_utilisateur`, `id_produit`) VALUES (1, 0, 1, :id_produit)";
        $result = $this->bdd->prepare($insertion);
        // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $result->bindvalue(':id_produit', $id_produit, PDO::PARAM_INT);
        $result->execute();

    }

    public function mise_a_jour_jaime($id_produit){
        $mise_a_jour = "UPDATE `j_aime_deteste` SET `j_aime`= 1,`deteste`= 0,`id_utilisateur`= 1 WHERE `id_produit`= :id_produit";
        $result = $this->bdd->prepare($mise_a_jour);
        // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $result->bindvalue(':id_produit', $id_produit, PDO::PARAM_INT);
        $result->execute();

    }

    public function etat_du_jaime($id_produit){
        $selection = "SELECT count(j_aime) as j_aime from j_aime_deteste where id_utilisateur = 1 and id_produit = :id_produit and j_aime = 1";
        $result = $this->bdd->prepare($selection);
        // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $result->bindvalue(':id_produit', $id_produit, PDO::PARAM_INT);
        $result->execute();
        $recuperer = $result->fetchAll();
        return $recuperer;
    }

    public function supprimer_jaime_deteste($id_produit){
        $supprimer = "DELETE FROM `j_aime_deteste` WHERE `id_produit` = :id_produit AND `id_utilisateur` = 1";
        $result = $this->bdd->prepare($supprimer);
        // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $result->bindvalue(':id_produit', $id_produit, PDO::PARAM_INT);
        $result->execute();
    }

    public function etat_du_deteste($id_produit){
        $selection = "SELECT count(deteste) as deteste from j_aime_deteste where id_utilisateur = 1 and id_produit = :id_produit and deteste = 1";
        $result = $this->bdd->prepare($selection);
        // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $result->bindvalue(':id_produit', $id_produit, PDO::PARAM_INT);
        $result->execute();
        $recuperer = $result->fetchAll();
        return $recuperer;
    }

    public function mise_a_jour_deteste($id_produit){
        $mise_a_jour = "UPDATE `j_aime_deteste` SET `j_aime`= 0,`deteste`= 1,`id_utilisateur`= 1 WHERE `id_produit`= :id_produit";
        $result = $this->bdd->prepare($mise_a_jour);
        // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $result->bindvalue(':id_produit', $id_produit, PDO::PARAM_INT);
        $result->execute();
    }

    public function deteste($id_produit){
        $insertion = "INSERT INTO `j_aime_deteste`(`j_aime`, `deteste`, `id_utilisateur`, `id_produit`) VALUES (0, 1, 1, :id_produit)";
        $result = $this->bdd->prepare($insertion);
        // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $result->bindvalue(':id_produit', $id_produit, PDO::PARAM_INT);
        $result->execute();
    }
}
?>