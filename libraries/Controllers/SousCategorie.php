<?php

    namespace Controllers;
    
    require_once('../Models/SousCategorie.php');

    class SousCategorie {

        public function creerSousCategorie($nom, $idCategorie) {

            $erreur = '';

            if(!empty($_POST['nom']) && !empty($_POST['categorie'])) {
                $nom = htmlspecialchars($_POST['nom']);
                $idCategorie = htmlspecialchars($_POST['categorie']);
                $verifSousCategorie = new \Models\SousCategorie(); 
                $recupere = $verifSousCategorie->verif_si_existe_deja($nom);
            
                if(count($recupere) == 0) {
                    $sousCategorie = new \Models\SousCategorie();
                    $sousCategorie->creation_sous_categorie($nom, $idCategorie);
                }
                else {
                    $erreur = 'sous_categorie déja existante';
                }
            }
            elseif(isset($nom) || isset($_POST['categorie'])){
                $erreur = 'champ vide';
            }

            return $erreur;
        }        
    }   
?>