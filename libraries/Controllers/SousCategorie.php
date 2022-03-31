<?php

    namespace Controllers;
    
    require_once('../Models/SousCategorie.php');

    class SousCategorie {

        public function creerSousCategorie($nom, $idCategorie) {
            $nom = htmlspecialchars($_POST['nom']);
            $idCategorie = htmlspecialchars($_POST['categorie']);
            $verifSousCategorie = new \Models\Model(); 
            $recupere = $verifSousCategorie->verif_si_existe_deja($nom);
            
            if(count($recupere) == 0) {
                $sousCategorie = new \Models\SousCategorie();
                $sousCategorie->creation_sous_categorie($nom, $idCategorie);
            }
            else {
              echo 'sous_categorie déja existante';
            }
        }
    }   
?>