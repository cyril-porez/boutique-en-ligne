<?php

    namespace Controllers;

    require_once('..\Models\Produits.php');
    require_once('..\Models\AimeDeteste.php');
    require_once('..\Models\Favoris.php');
    require_once('function.php');

    class Produits {

        private $etat_jaime;
        private $etat_deteste;


        public function verifProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $image) {

            $verif = new \Models\Produits();
            $recupere = $verif->verif_si_existe_deja($nom);
            $recupere_ref = $verif->verif_ref($reference);
            $error ='';

            if(count($recupere) == 0){
                $produits = new \Models\Produits();
                $produits->inserer_produit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $image);
            }
            else{
                $error = 'produit déja existant';
            }
            return $error;
        }


        public function creerProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $filename) {            $nom = protectionDonnées($_POST['nomCreer']);
            $reference = protectionDonnées($_POST['referenceCreer']);
            $description = protectionDonnées($_POST['descriptionCreer']);
            $classe = protectionDonnées($_POST["classeCreer"]);
            $categorie = protectionDonnées($_POST['categorieCreer']);
            $sousCategorie = protectionDonnées($_POST['sous-categorieCreer']);
            $prix = protectionDonnées($_POST['prixCreer']);
            // $image = protectionDonnées($_FILES['image']);
            $produits = new Produits();
            $produit = $produits->verifProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $filename);
        }

        public function modifierProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $filename, $id) {
            $reference = protectionDonnées($_POST['referenceModifier']);
            $description = protectionDonnées($_POST['descriptionModifier']);
            $classe = protectionDonnées($_POST["classeModifier"]);
            $categorie = protectionDonnées($_POST['categorieModifier']);
            $sousCategorie = protectionDonnées($_POST['sous-categorieModifier']);
            $prix = protectionDonnées($_POST['prixModifier']);

            $verif = new \Models\Produits();
            $recupere = $verif->verif_si_existe_deja($nom);
            $recupere_ref = $verif->verif_ref($reference);
            $error ='';

            if(count($recupere) == 0){
                $produits = new \Models\Produits();
                $produits->modifierProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $filename, $id);
            }
            else{
                $error = 'produit déja existant';
            }
            return $error;
        }


        public function jaime($recup_produit) {
            $aime_deteste = new \Models\AimeDeteste();
            $produit = new \Models\Produits();

            $fetch4 = $produit->recuperation_par_id($recup_produit);
            $id_produit = $fetch4[0]['id'];

            $recuperer_jaime = $aime_deteste->etat_du_jaime($id_produit);
            $etat_jaime = $recuperer_jaime[0]['j_aime'];


            $recuperer_deteste = $aime_deteste->etat_du_deteste($id_produit);
            $etat_deteste = $recuperer_deteste[0]['deteste'];

            if(isset($_POST['jaime'])){
                if ($etat_jaime == 0 && $etat_deteste == 1) {
                    $aime_deteste->mise_a_jour_jaime($id_produit);
                    header("Refresh: 0");
                }
                else if ($etat_jaime == 1 && $etat_deteste == 0) {
                    $aime_deteste->supprimer_jaime_deteste($id_produit);
                    header("Refresh: 0");
                }
                else {
                    $aime_deteste->j_aime($id_produit);
                    header("Refresh: 0");
                }
            }
        }

        public function deteste($recup_produit) {

            $aime_deteste = new \Models\AimeDeteste;
            $produit = new \Models\Produits;

            $fetch4 = $produit->recuperation_par_id($recup_produit);
            $id_produit = $fetch4[0]['id'];

            $recuperer_jaime = $aime_deteste->etat_du_jaime($id_produit);
            $etat_jaime = $recuperer_jaime[0]['j_aime'];
            // echo "etat like" . $etat_jaime . "<br>" ;

            $recuperer_deteste = $aime_deteste->etat_du_deteste($id_produit);
            $etat_deteste = $recuperer_deteste[0]['deteste'];
            // echo "etat deteste" . $recuperer_deteste[0]['deteste'];

            if (isset($_POST["deteste"])) {
                if ($etat_jaime == 1 && $etat_deteste == 0) {
                    $aime_deteste->mise_a_jour_deteste($id_produit);
                    header("Refresh: 0");
                }
                else if ($etat_jaime == 0 && $etat_deteste == 1) {
                    $aime_deteste->supprimer_jaime_deteste($id_produit);
                    header("Refresh: 0");
                }
                else {
                    $aime_deteste->deteste($id_produit);
                    header("Refresh: 0");
                }
            }
        }


        public function afficherProduitsFavoris($idUtilisateur) {
            $favoris = new \Models\Favoris();
            $afficherProduitFavoris = $favoris-> afficherProduitFavoris($idUtilisateur);
            return $afficherProduitFavoris;
        }
    }

    $maxsize = 50000;

            $validExt = array('.jpg', '.jpeg', '.png','.webp');

        if(!empty($_FILES['telechargerImage'])) {

            $image = $_FILES['telechargerImage'];

            if($image['error'] > 0){
                echo "erreur lors du transfert";
            }

            $filesize = $image['size'];

            if ($filesize > $maxsize) {
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

            $filename = "images/".$uniquename.$fileExt;

            $resultat = move_uploaded_file($tmpname, $filename);

            if($resultat) {
                echo "Uploaded successfully";
            }
        }
?>