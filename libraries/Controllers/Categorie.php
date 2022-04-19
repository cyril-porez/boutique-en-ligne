<?php

    namespace Controllers;
    
    require_once('../Models/Categorie.php');

    class Categorie {

        public function verifCategorie($nom, $genre) {
            $categorie = new \Models\Categorie();
            $recupere = $categorie->verif_si_existe_deja($nom);
            $erreur = '';
            
            if(count($recupere) == 0){
                $categorie = new \Models\Categorie();
                $categorie->creer_categorie($nom, $genre);
            }
            else{
                $erreur = 'categorie déja existante';
            }

            return $erreur;
        }


        public function verifCategorieModifier($nom, $genre, $id) {
            $categorie = new \Models\Categorie();
            $recupere = $categorie->verif_si_existe_deja($nom);
            $erreur ='';

            if(count($recupere) == 0){
                $categorie = new \Models\Categorie();
                $categorie->modifierCategorie($nom, $genre, $id);
            }
            else{
                $erreur = 'categorie déja existante';
            }
            return $erreur;
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
        
        
        public function modifierCategorie($nom, $genre, $id) {
            $nom =  htmlspecialchars($_POST['nomModifier']);
            $genre = htmlspecialchars($_POST['genreModifier']);
            $verif = new \Controllers\Categorie();
            return $verif->verifCategorieModifier($nom, $genre, $id);
        }
    }
?>