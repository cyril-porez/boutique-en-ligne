<?php

    namespace Controllers;

    require_once('../Models/Commentaires.php');
    require_once('../Models/CommentaireDuCommentaire.php');
    require_once('function.php');

    class Commentaires {
        public function posterCommentaire($commentaires, $idUtilisateur, $idProduit) {
            $erreur = '';
            if (!empty($_POST['commentaire'])) {
                $commentaires = htmlspecialchars($_POST['commentaire']);
                $commentaire = new \Models\Commentaires();
                $commentaire->Commentaires($commentaires, $idUtilisateur, $idProduit);
            }
            else if (isset($_POST['commentaire'])) {
                $erreur = "* Champ vide";
            }
            return $erreur;
        }

        public function AfficheCommentaire($idProduit) {

            $commentaire = new \Models\Commentaires();
            $affiche = $commentaire->selectCommentaires($idProduit);
            return $affiche;
        }

        public function reponseCommentaire($reponses, $idCommentaire, $idUtilisateur, $idProduit) {
            if (!empty($_POST['reponse'])) {
                $reponses = htmlspecialchars($_POST['reponse']);
                $reponse = new \Models\CommentaireDuCommentaire();
                $reponse->insertCommentaireCommentaire($reponses, $idCommentaire, $idUtilisateur, $idProduit);
            }
        }

        public function affichReponse($idCommentaire) {
            $reponse = new \Models\CommentaireduCommentaire();
            $reponseCom = $reponse->afficheReponse($idCommentaire);
            return $reponseCom;
        } 
    }
?>