<?php

    namespace Models;

    require_once('Model.php');

    class Adresses extends Model {

        protected $idUtilisateur;


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
    }
?>