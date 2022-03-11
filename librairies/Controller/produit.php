<?php
require_once('../Models/class_Produits.php');

$recup_produit = $_GET['produit'];

$produit = new Produits;

$fetch4 = $produit->recuperation_par_id($recup_produit);
 $id_produit = $fetch4[0]['id'];

$recuperer_jaime = $produit->etat_du_jaime($id_produit);
$etat_jaime = $recuperer_jaime[0]['j_aime'];
echo "etat like" . $etat_jaime . "<br>" ;

$recuperer_deteste = $produit->etat_du_deteste($id_produit);
$etat_deteste = $recuperer_deteste[0]['deteste'];
echo "etat deteste" . $recuperer_deteste[0]['deteste'];


if(isset($_POST['jaime'])){
    if ($etat_jaime == 0 && $etat_deteste == 1) {
        $produit->mise_a_jour_jaime($id_produit);
    }
    else if ($etat_jaime == 1 && $etat_deteste == 0) {
        $produit->supprimer_jaime_deteste($id_produit);
    }
    else {
        $produit->j_aime($id_produit);
    }
}
else if (isset($_POST["deteste"])) {
    if ($etat_jaime == 1 && $etat_deteste == 0) {
        $produit->mise_a_jour_deteste($id_produit);
    }
    else if ($etat_jaime == 0 && $etat_deteste == 1) {
        $produit->supprimer_jaime_deteste($id_produit);
    }
    else {
        $produit->deteste($id_produit);
    }
}
?>