<?php

    namespace Controllers;
   
    require_once('..\Models\Produits.php');
    require_once('..\Models\AimeDeteste.php');

    class Produits {

        private $etat_jaime;
        private $etat_deteste;


        public function creerProduit($nom, $reference, $classe, $description, $categorie, $sousCategorie, $prix, $image) {
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


        public function jaime($recup_produit) {
            $aime_deteste = new \Models\AimeDeteste();
            $produit = new \Models\Produits();
            
            $fetch4 = $produit->recuperation_par_id($recup_produit);
            $id_produit = $fetch4[0]['id'];
        
            $recuperer_jaime = $aime_deteste->etat_du_jaime($id_produit);
            $etat_jaime = $recuperer_jaime[0]['j_aime'];
            echo "etat like" . $etat_jaime . "<br>" ;

            $recuperer_deteste = $aime_deteste->etat_du_deteste($id_produit);
            $etat_deteste = $recuperer_deteste[0]['deteste'];
            echo "etat deteste" . $recuperer_deteste[0]['deteste'];

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
            echo "etat like" . $etat_jaime . "<br>" ;

            $recuperer_deteste = $aime_deteste->etat_du_deteste($id_produit);
            $etat_deteste = $recuperer_deteste[0]['deteste'];
            echo "etat deteste" . $recuperer_deteste[0]['deteste'];

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
    }
?>