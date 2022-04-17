<?php

    namespace Controllers;
    
    require_once('../Models/Categorie.php');

    class Categorie {

        public function verifCategorie($nom, $genre) {
            $categorie = new \Models\Categorie();
            $recupere = $categorie->verif_si_existe_deja($nom);

            if(count($recupere) == 0){
                $categorie = new \Models\Categorie();
                $categorie->creer_categorie($nom, $genre);
            }
            else{
                echo 'categorie déja existante';
            }
        }


        public function selectCategorie () {
            $afficheProduit = new \Models\Categorie();
            return $afficheProduit->selectCategorie();
        }

        public function creerCategorie($nom, $genre) {           
            $nom =  htmlspecialchars($_POST['nom']);
            $genre = htmlspecialchars($_POST['genre']);
            $verif = new \Controllers\Categorie();
            $verif->verifCategorie($nom, $genre);            
        }          
    }
?>