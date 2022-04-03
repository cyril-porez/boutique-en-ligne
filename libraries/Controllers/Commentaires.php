<?php
    
    namespace Controllers;

    require_once('../Models/Commentaires.php');

    class Commentaires {

        public function posterCommentaire() {
            
            if (!empty($_POST['commentaire'])) {
                $commentaire = new \Models\Commentaires();
                $commentaire->Commentaires($_POST['commentaire']);
            }
        }
    }
?>