<?php
    namespace Models;
    
    require_once('Bdd.php');
    
    class Utilisateur extends Bdd {
        //propriétés
        
        //constructeurs
        public function __construct(){
            parent::__construct($this->bdd);
        }
        //méthodes
        //enregistrer utilisateur
        
        public function register($nom, $prenom, $email, $mot_de_passe, $adresse, $code_postale, $pays, $ville, $num) {
            $requete = $this->bdd->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, adresse, code_postale, pays, ville, id_droits, num, token, date)  VALUES (:nom, :prenom, :email, :mot_de_passe, :adresse, :code_postale, :pays, :ville, :id_droits, :num, 'null', :date)");
            $date  = date('Y-m-d H:i:s');
            $requete->bindValue(":prenom", $prenom, \PDO::PARAM_STR);
            $requete->bindValue(":nom", $nom, \PDO::PARAM_STR);
            $requete->bindValue(":email", $email, \PDO::PARAM_STR);
            $requete->bindValue(":adresse", $adresse, \PDO::PARAM_STR);
            $requete->bindValue(":mot_de_passe", $mot_de_passe, \PDO::PARAM_STR);
            $requete->bindValue(":code_postale", $code_postale, \PDO::PARAM_INT);
            $requete->bindValue(":pays", $pays, \PDO::PARAM_STR);
            $requete->bindValue(":ville", $ville, \PDO::PARAM_STR);
            $requete->bindValue(":num",$num, \PDO::PARAM_INT);
            $requete->bindValue(":id_droits", 1, \PDO::PARAM_INT);
            $requete->bindValue(":date", $date);
            $requete->execute();
        }
        
        public function verif_si_existe_deja($email) {
            $selection = "SELECT email FROM utilisateurs WHERE email = :email";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(":email", $email, \PDO::PARAM_STR);
            $result->execute();
            $recupere = $result->fetchAll();
            return $recupere;
        }
        //connecter utilisateur
    
        public function connexion($email){
            $requete2 = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
            $requete2->bindValue(":email", $email, \PDO::PARAM_STR);
            $requete2 ->execute();
            $recuperer = $requete2->fetchAll();
            return $recuperer;
        }
    }
?>