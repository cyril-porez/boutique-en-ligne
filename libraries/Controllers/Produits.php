<?php

    namespace Controllers;
   
    require_once('..\Models\Produits.php');

    class Produits {

        public function creerProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $image, ) {
            $produits = new \Models\Produits();
           
            $erreur = '';
        
            if(!empty($_POST['nom']) && !empty($_POST['reference']) && !empty($_POST['classe']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['sous-categorie']) && !empty($_POST['prix']) && !empty($_POST['image'])){
                $nom = htmlspecialchars($_POST['nom']);
                $reference = htmlspecialchars($_POST['reference']);
                $description = htmlspecialchars($_POST['description']);
                $prix = htmlspecialchars($_POST['prix']);
                $image = htmlspecialchars($_POST['image']);
                $recupere = $produits->verif_si_existe_deja($nom);
                //faire la verif de la reférence
                
                if(count($recupere) == 0){
                    $produits->inserer_produit($nom, $reference, $_POST["classe"], $description, $_POST['categorie'], $_POST['sous-categorie'], $prix, $image);
                }
                else{
                    $erreur = 'produit déja existant';
                }
            }
            else if(empty($nom) && empty($reference) && empty($_POST["classe"]) && empty($description) && empty($_POST["id_utilisateur"]) && empty($_POST["categorie"]) && empty($_POST["sous-categorie"]) && empty($prix) && empty($image)){
                        $erreur = 'champ vide';
            }

            return $erreur;
        }

    }


?>