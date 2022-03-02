<?php
// nom	reference	classe	description	id_utilisateur	id_categorie	id_sous-categorie
class Produits{

    private $id;
    public $nom;
    public $reference;
    public $classe;
    public $description;
    public $id_utilisateur;
    public $id_categorie;
    public $id_sous_categorie;
    public $prix;

    public function __construct(){
        $bdd = new PDO("mysql:host=localhost;dbname=carnage",'root','');
        $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $this->bdd = $bdd;
        return $bdd;
    }

    public function inserer_produit($nom, $reference, $classe, $description, $id_utilisateur, $id_categorie, $id_sous_categorie, $prix){

        $insertion = "INSERT INTO `produits`(`nom`, `reference`, `classe`, `description`, `id_utilisateur`, `id_categorie`, `id_sous-categorie`, `prix`) VALUES (:nom, :reference, :classe, :description, :id_utilisateur, :id_categorie, :id_sous_categorie, :prix)";
        $result = $this->bdd->prepare($insertion);
        $result->bindValue(':nom', $nom, PDO::PARAM_STR);
        $result->bindValue(':reference', $reference, PDO::PARAM_STR);
        $result->bindValue(':classe', $classe, PDO::PARAM_STR);
        $result->bindValue(':description', $description, PDO::PARAM_STR);
        $result->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $result->bindValue(':id_categorie', $id_categorie, PDO::PARAM_INT);
        $result->bindValue(':id_sous_categorie', $id_sous_categorie, PDO::PARAM_INT);
        $result->bindValue(':prix', $prix, PDO::PARAM_STR);
        $result->execute();
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

    public function creation_sous_categorie($nom, $id_categorie){
        $creation = "INSERT INTO `sous_categories`(`nom`, `id_categories`) VALUES (:nom,:id_categorie)";
        $result = $this->bdd->prepare($creation);
        $result->bindValue(':nom', $nom, PDO::PARAM_STR);
        $result->bindValue(':id_categorie', $id_categorie, PDO::PARAM_INT);
        $result->execute();
    }

    public function selection_sous_categorie(){
        $selection = "SELECT * FROM sous_categories";
        $result = $this->bdd->prepare($selection);
        $result->execute();
        $fetch2 = $result->fetchAll();
        return $fetch2;
    }
    public function selection_produits(){
        $selection = "SELECT * FROM produits";
        $result = $this->bdd->prepare($selection);
        $result->execute();
        $fetch3 = $result->fetchAll();
        return $fetch3;
    }
    public function selection_un_produits($id){
        $selection = "SELECT * FROM produits WHERE id = :id";
        $result = $this->bdd->prepare($selection);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $fetch3 = $result->fetchAll();
        return $fetch3;
    }
}
?>