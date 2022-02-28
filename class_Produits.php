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

    public function __construct(){
        $bdd = new PDO("mysql:host=localhost;dbname=carnage",'root','');
        $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $this->bdd = $bdd;
        return $bdd;
    }

    public function inserer_produit($nom, $reference, $classe, $description, $id_utilisateur, $id_categorie, $id_sous_categorie){

        $insertion = "INSERT INTO `produits`(`nom`, `reference`, `classe`, `description`, `id_utilisateur`, `id_categorie`, `id_sous-categorie`) VALUES (:nom, :reference, :classe, :description, :id_utilisateur, :id_categorie, :id_sous_categorie)";
        $result = $this->bdd->prepare($insertion);
        $result->bindValue(':nom', $nom, PDO::PARAM_STR);
        $result->bindValue(':reference', $reference, PDO::PARAM_STR);
        $result->bindValue(':classe', $classe, PDO::PARAM_STR);
        $result->bindValue(':description', $description, PDO::PARAM_STR);
        $result->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_STR);
        $result->bindValue(':id_categorie', $id_categorie, PDO::PARAM_STR);
        $result->bindValue(':id_sous_categorie', $id_sous_categorie, PDO::PARAM_STR);
        $result->execute();
    }
}
?>