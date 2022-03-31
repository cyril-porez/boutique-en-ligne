<?php

    namespace Controllers;
    
    require_once('../Models/Categorie.php');

    class Categorie {


        public function verifCategorie($nom) {
            $categorie = new \Models\Model;
            $recupere = $categorie->verif_si_existe_deja($nom);

            if(count($recupere) == 0){
                $categorie = new \Models\Categorie();
                $categorie->creer_categorie($nom);
            }
            else{
                echo 'categorie déja existante';
            }
        }

        public function creerCategorie($nom) {           
            $nom =  htmlspecialchars($_POST['nom']);
            $verif = new \Controllers\Categorie();
            $verif->verifCategorie($nom);            
        }           
    }
?>