<?php
    require_once('../Models/modelAimeDeteste.php');
    require_once('../Models/class_Produits.php');

    $recup_produit = $_GET['produit'];

    $aime_deteste = new AimeDeteste;
    $produit = new Produits;

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
    else if (isset($_POST["deteste"])) {
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
?>