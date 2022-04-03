<?php

    namespace Models;

    require_once('Model.php');

    class Commentaires extends Model {


        public function Commentaires($commentaire) {
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO `commentaires`(commentaire, date, id_utilisateur, id_produit) VALUES (:commentaire, :date, 1, 1)";
            $commentaires = $this->bdd->prepare($sql);
            $commentaires->bindValue(':commentaire', $commentaire, \PDO::PARAM_STR);
            $commentaires->bindValue(':date', $date, \PDO::PARAM_STR);
            //$commentaires->bindValue(':id_utilisateur', $idUtilisateur, \PDO::PARAM_INT);
            //$commentaires->bindValue('id_produit', $idProduit, \PDO::PARAM_INT);
            $commentaires->execute();

        }
    }

?>