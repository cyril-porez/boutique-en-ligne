<?php

    namespace Controllers;
    
    require_once('../autoload.php');
    require_once('function.php');
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
            $nom =  protectionDonnées($_POST['nom']);
            $genre = protectionDonnées($_POST['genre']);
            $verif = new \Controllers\Categorie();
            $verif->verifCategorie($nom, $genre);            
        } 
        
        
        public function modifierCategorie($nom, $genre, $id) {
            $nom =  protectionDonnées($_POST['nomModifier']);
            $genre = protectionDonnées($_POST['genreModifier']);
            $verif = new \Controllers\Categorie();
            return $verif->verifCategorieModifier($nom, $genre, $id);
        }
    }
?>