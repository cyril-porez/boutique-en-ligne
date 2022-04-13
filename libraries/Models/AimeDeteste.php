<?php

    namespace Models;

    require_once('Model.php');

    class AimeDeteste extends Model {
        

        public function j_aime($id_produit){
            $insertion = "INSERT INTO `j_aime_deteste`(`j_aime`, `deteste`, `id_utilisateur`, `id_produit`) VALUES (1, 0, 1, :id_produit)";
            $result = $this->bdd->prepare($insertion);
            // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $result->bindvalue(':id_produit', $id_produit, \PDO::PARAM_INT);
            $result->execute();
        }

    
        public function mise_a_jour_jaime($id_produit){
            $mise_a_jour = "UPDATE `j_aime_deteste` SET `j_aime`= 1,`deteste`= 0,`id_utilisateur`= 1 WHERE `id_produit`= :id_produit";
            $result = $this->bdd->prepare($mise_a_jour);
            // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $result->bindvalue(':id_produit', $id_produit, \PDO::PARAM_INT);
            $result->execute();
        }

    
        public function etat_du_jaime($id_produit){
            $selection = "SELECT count(j_aime) as j_aime from j_aime_deteste where id_utilisateur = 1 and id_produit = :id_produit and j_aime = 1";
            $result = $this->bdd->prepare($selection);
            // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $result->bindvalue(':id_produit', $id_produit, \PDO::PARAM_INT);
            $result->execute();
            $recuperer = $result->fetchAll();
            return $recuperer;
        }

        public function supprimer_jaime_deteste($id_produit){
            $supprimer = "DELETE FROM `j_aime_deteste` WHERE `id_produit` = :id_produit AND `id_utilisateur` = 1";
            $result = $this->bdd->prepare($supprimer);
            // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $result->bindvalue(':id_produit', $id_produit, \PDO::PARAM_INT);
            $result->execute();
        }

        public function etat_du_deteste($id_produit){
            $selection = "SELECT count(deteste) as deteste from j_aime_deteste where id_utilisateur = 1 and id_produit = :id_produit and deteste = 1";
            $result = $this->bdd->prepare($selection);
            // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $result->bindvalue(':id_produit', $id_produit, \PDO::PARAM_INT);
            $result->execute();
            $recuperer = $result->fetchAll();
            return $recuperer;
        }

        public function mise_a_jour_deteste($id_produit){
            $mise_a_jour = "UPDATE `j_aime_deteste` SET `j_aime`= 0,`deteste`= 1,`id_utilisateur`= 1 WHERE `id_produit`= :id_produit";
            $result = $this->bdd->prepare($mise_a_jour);
            // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $result->bindvalue(':id_produit', $id_produit, \PDO::PARAM_INT);
            $result->execute();
        }

        public function deteste($id_produit){
            $insertion = "INSERT INTO `j_aime_deteste`(`j_aime`, `deteste`, `id_utilisateur`, `id_produit`) VALUES (0, 1, 1, :id_produit)";
            $result = $this->bdd->prepare($insertion);
            // $result->bindvalue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $result->bindvalue(':id_produit', $id_produit, \PDO::PARAM_INT);
            $result->execute();
        }
    }
?>