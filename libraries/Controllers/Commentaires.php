<?php

    namespace Controllers;

    require_once('../Models/Commentaires.php');
    require_once('../Models/CommentaireDuCommentaire.php');
    require_once('function.php');

    class Commentaires {

        public function posterCommentaire() {
            $erreur = '';
            if (!empty($_POST['commentaire'])) {
                $commentaires = protectionDonnées($_POST['commentaire']);
                $commentaire = new \Models\Commentaires();
                $commentaire->Commentaires($commentaires);
            }
            else if (isset($_POST['commentaire'])) {
                $erreur = "* Champ vide";
            }
            return $erreur;
        }

        public function AfficheCommentaire() {

            $commentaire = new \Models\Commentaires();
            $affiche = $commentaire->selectCommentaires();
            return $affiche;
        }

        public function reponseCommentaire($reponses, $idCommentaire) {
            if (!empty($_POST['reponse'])) {
                $reponses = protectionDonnées($_POST['reponse']);
                $reponse = new \Models\CommentaireDuCommentaire();
                $reponse->insertCommentaireCommentaire($reponses, $idCommentaire);
            }
        }

        public function affichReponse($idCommentaire) {
            $reponse = new \Models\CommentaireduCommentaire();
            $reponseCom = $reponse->afficheReponse($idCommentaire);
            return $reponseCom;
        } 
    }
?>