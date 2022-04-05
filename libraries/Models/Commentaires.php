<?php

    namespace Models;

    require_once('Model.php');

    class Commentaires extends Model {


        public function Commentaires($commentaire) {
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO `commentaires`(commentaire, date, id_utilisateur, id_produit) VALUES (:commentaire, :date, 3, 1)";
            $commentaires = $this->bdd->prepare($sql);
            $commentaires->bindValue(':commentaire', $commentaire, \PDO::PARAM_STR);
            $commentaires->bindValue(':date', $date, \PDO::PARAM_STR);
            //$commentaires->bindValue(':id_utilisateur', $idUtilisateur, \PDO::PARAM_INT);
            //$commentaires->bindValue('id_produit', $idProduit, \PDO::PARAM_INT);
            $commentaires->execute();

        }

        public function SelectCommentaires() {
            echo "blablabaka";
            $sql = "SELECT commentaires.id, commentaire, utilisateurs.nom, utilisateurs.prenom, commentaires.date from commentaires inner join utilisateurs ON commentaires.id_utilisateur = utilisateurs.id inner join produits ON commentaires.id_produit = produits.id  where produits.id = 1";
            $commentaires = $this->bdd->prepare($sql);
            //$commentaires->bindValue(':id_produit', $idProduit, \PDO::PARAM_INT);
            $commentaires->execute();
            $message = $commentaires->fetchall(\PDO::FETCH_ASSOC);
            return $message;
        }
    }



?>