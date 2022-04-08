<?php

    namespace Models;

    require_once('Model.php');

    class CommentaireDuCommentaire extends Model{

        public function insertCommentaireCommentaire($commentaire, $idCommentaire) {

            $date = date('Y-m-d H:i:s');
            //$sql = "INSERT INTO `commentaires`(commentaire, date, id_utilisateur, id_produit) VALUES (:commentaire, :date, 3, 1)";
            $sql = "INSERT INTO `commentaire_du_commentaire`(reponse, date, id_utilisateur, id_commentaire, id_produit) VALUES (:commentaire, :date, 2, :idCommentaire, 1)";
            $commentaires = $this->bdd->prepare($sql);
            $commentaires->bindValue(':commentaire', $commentaire, \PDO::PARAM_STR);
            $commentaires->bindValue(':date', $date, \PDO::PARAM_STR);
            //$commentaires->bindValue(':id_utilisateur', $idUtilisateur, \PDO::PARAM_INT);
            $commentaires->bindValue(':idCommentaire', $idCommentaire, \PDO::PARAM_INT);
            //$commentaires->bindValue('id_produit', $idProduit, \PDO::PARAM_INT);
            $commentaires->execute();
        }


        public function afficheReponse($idCommentaire) {
            $sql = "SELECT id_commentaire, reponse, commentaire_du_commentaire.date, utilisateurs.nom from commentaire_du_commentaire inner join utilisateurs ON commentaire_du_commentaire.id_utilisateur = utilisateurs.id where id_produit = 1 and id_commentaire = :commentaire";
            $reponses = $this->bdd->prepare($sql);
            $reponses->bindValue(':commentaire', $idCommentaire, \PDO::PARAM_INT);
            $reponses->execute();
            $reponsesCom = $reponses->fetchall(\PDO::FETCH_ASSOC);
            return $reponsesCom;
        } 
    }
?>