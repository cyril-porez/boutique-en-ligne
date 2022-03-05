<?php 

require_once('Bdd.php');

class Utilisateur extends Bdd {

    //propriétés


    //constructeurs
    public function __construct(){
        parent::__construct($this->bdd);
    }


    //méthodes

    //enregistrer utilisateur
    public function register($nom,$prenom,
                                $email,$mot_de_passe,
                                $adresse,$code_postale,
                                $pays,$ville,
                                $num)
    {

        $requete = $this->bdd->prepare("INSERT INTO utilisateurs (nom,prenom,
                                                                    email,mot_de_passe,
                                                                    adresse,code_postale,
                                                                    pays,ville,
                                                                    id_droits,num) 
                                        VALUES (:nom,:prenom,
                                                    :email,:mot_de_passe,
                                                    :adresse,:code_postale,
                                                    :pays,:ville,
                                                    :id_droits,:num)");

        var_dump(intval($code_postale));
        $requete->bindValue(":prenom",$prenom, PDO::PARAM_STR);
        $requete->bindValue(":nom",$nom,PDO::PARAM_STR);
        $requete->bindValue(":email",$email, PDO::PARAM_STR);
        $requete->bindValue(":adresse",$adresse, PDO::PARAM_STR);
        $requete->bindValue(":mot_de_passe",$mot_de_passe, PDO::PARAM_STR);
        $requete->bindValue(":code_postale",intval($code_postale), PDO::PARAM_INT);
        $requete->bindValue(":pays",$pays, PDO::PARAM_STR);
        $requete->bindValue(":ville",$ville,PDO::PARAM_STR);
        $requete->bindValue(":num",$num, PDO::PARAM_STR);
        $requete->bindValue(":id_droits", 1);


        $requete->execute(); 

    }
   
    //connecter utilisateur
    public function connexion($email, $mot_de_passe){

        $requette2 = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = '$email' AND password = '$mot_de_passe'");
    }

}

