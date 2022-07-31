<?php

    namespace Models;

    require_once('Model.php');

    class CommentaireDuCommentaire extends Model{

        public function insertCommentaireCommentaire($commentaire, $idCommentaire, $idUtilisateur, $idProduit) {
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO `commentaire_du_commentaire`(reponse, date, id_utilisateur, id_commentaire, id_produit) VALUES (:commentaire, :date, :idUtilisateur, :idCommentaire, :idProduit)";
            $commentaires = $this->bdd->prepare($sql);
            $commentaires->execute(array(':commentaire' => $commentaire, ':date' => $date, ':idUtilisateur' => $idUtilisateur, 'idCommentaire' => $idCommentaire, ':idProduit' => $idProduit));
        }


        public function afficheReponse($idCommentaire) {
            $sql = "SELECT id_commentaire, reponse, commentaire_du_commentaire.date, utilisateurs.nom from commentaire_du_commentaire inner join utilisateurs ON commentaire_du_commentaire.id_utilisateur = utilisateurs.id where id_produit = 1 and id_commentaire = :commentaire";
            $reponses = $this->bdd->prepare($sql);
            $reponses->execute(array(':commentaire' => $idCommentaire));
            $reponsesCom = $reponses->fetchall(\PDO::FETCH_ASSOC);
            return $reponsesCom;
        } 
    }
?>