<?php

    namespace Models;

    require_once('Model.php');

    class Adresses extends Model {

        protected $idUtilisateur;
        protected $adresse;
        protected $codePostal;
        protected $ville;
        protected $pays;


        public function selectAdresse($id) {
            $selection = "SELECT * FROM adresses WHERE id_utilisateur = :id";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':id', $id, \PDO::PARAM_INT);
            $result->execute();
            $recuperer_tout = $result->fetch(\PDO::FETCH_ASSOC);
            return $recuperer_tout;
        }

        public function selectCountLogin($idUtilisateur) {

            $this->idUtilisateur = $idUtilisateur; 
            $sql = "SELECT id_utilisateur From adresses WHERE id_utilisateur = :idUtilisateur";
            $result = $this->bdd->prepare($sql); 
            $result->bindValue(':idUtilisateur', $this->idUtilisateur, \PDO::PARAM_STR);
            $result->execute();
            $Utilisateur = $result->fetchAll(\PDO::FETCH_ASSOC);
            $this->count = $result->rowCount();
            return $this->count;
        }


        public function Adresse($id) {
            $sql = "INSERT into adresses (adresse, code_postal, ville, pays, num_tel, id_utilisateur) SELECT adresse, code_postale, ville, pays, num, id from utilisateurs WHERE utilisateurs.id = :id";
            $result = $this->bdd->prepare($sql);
            $result->bindValue(':id', $id, \PDO::PARAM_INT);
            return $result->execute();
        } 


        public function modifierAdresseLivraison($adresse, $ville, $codePostal, $pays, $idUtilisateur) {
            $this->adresse = $adresse;
            $this->codePostal = $codePostal;
            $this->ville = $ville;
            $this->pays = $pays;
            $this->idUtilisateur = $idUtilisateur;
            
            $sql = "UPDATE adresses SET adresse = :adresse, code_postal = :codePostal, ville = :ville, pays = :pays WHERE id_utilisateur = :idUtilisateur";
            $result = $this->bdd->prepare($sql);
            $result->bindValue(':adresse', $this->adresse, \PDO::PARAM_STR);
            $result->bindValue(':codePostal', $this->codePostal, \PDO::PARAM_STR);
            $result->bindValue(':ville', $this->ville, \PDO::PARAM_STR);
            $result->bindValue(':pays', $this->pays, \PDO::PARAM_STR);
            $result->bindValue(':idUtilisateur', $this->idUtilisateur, \PDO::PARAM_STR);            
            return $result->execute();
        }
    }
?>