<?php

    namespace Controllers;

    require_once('../Models/Produits.php');

    class Produits {

        public function verifProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $image) {
            $verif = new \Models\Model();
            $verif_ref = new \Models\Produits();
            $recupere = $verif->verif_si_existe_deja($nom);
            $recupere_ref = $verif_ref->verif_si_existe_deja_ref($reference);
            $error ='';

            if(count($recupere) == 0){
                $produits = new \Models\Produits();
                $produits->inserer_produit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $image);
            }
            // elseif(count($recupere_ref) == 0){
            //     $produits = new \Models\Produits();
            //     $produits->inserer_produit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $image);
            // }
            else{
                $error = 'produit déja existant';
            }
            return $error;
        }

        public function creerProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $image) {
            $nom = htmlspecialchars($_POST['nom']);
            $reference = htmlspecialchars($_POST['reference']);
            $description = htmlspecialchars($_POST['description']);
            $classe = htmlspecialchars($_POST["classe"]);
            $categorie = htmlspecialchars($_POST['categorie']);
            $sousCategorie = htmlspecialchars($_POST['sous-categorie']);
            $prix = htmlspecialchars($_POST['prix']);
            // $image = htmlspecialchars($_FILES['image']);

            $maxsize = 50000;
            $validExt = array('.jpg', '.jpeg', '.png', '.gif');
            $image = $_FILES['uploaded_file'];

            if($image['error'] > 0){
                echo "erreu lors du transfert";
            }

            $filesize = $image['size'];

            if ($filesize > $maxsize){
                echo "fichier trop lourd";
            }
            $filename = $image['name'];
            //  strtolower au cas ou si on a une extension 'PNG'
            $fileExt = '.'.strtolower(substr(strrchr($filename, '.'), 1));

            //  on verifie si notre extension et dans l'array
            if(!in_array($fileExt, $validExt)){
                echo "le fichier n'est pas une image";
            }

            $tmpname = $image['tmp_name'];
            $uniquename = md5(uniqid(rand(), true));
            $filename = "../upload/".$uniquename.$fileExt;
            $resultat = move_uploaded_file($tmpname, $filename);
            if($resultat){
                echo "Uploaded successfully";
            }
            $produits = new Produits();
            $produit = $produits->verifProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $image);

        }
    }

    
?>