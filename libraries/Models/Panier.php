<?php
    namespace Models;

    require_once('Model.php');

    class Panier extends Model {


        protected $idUtilisateur;
        protected $idProduit;
        protected $quantite;
        protected $idNomTailleKimono;

        

        public function ajoutPanier($idUtilisateur, $idProduit, $quantite, $idNomTailleKimono) {
            $sql = "INSERT INTO panier (id_utilisateur, id_produit, quantite, id_nom_taille_kimono, id_nom_taille_gant, id_nom_taille_vetement) VALUES (:idUtilisateur, :idProduit, :quantite, :idNomTailleKimono, :idNomTailleGant, :id_nom_taille_vetement)";
            $ajout = $this->bdd->prepare($sql);
            $ajout->execute(array(':idUtilisateur' => $idUtilisateur, ':idProduit' => $idProduit, ':quantite' => (int) $quantite, ':idNomTailleKimono' => $idNomTailleKimono, ':idNomTailleGant' => 0, ':id_nom_taille_vetement' => 0));
        }

        public function modifQuantite($idUtilisateur, $idProduit, $quantite,  $idTaille) {
            $sql = "UPDATE panier SET quantite = :quantite WHERE id_utilisateur = :idUtilisteur and id_produit = :idProduit and id_nom_taille_kimono = :idTaille";
            $modifierQuantite = $this->bdd->prepare($sql);
            $modifierQuantite->execute(array(':idUtilisteur' => $idUtilisateur, ':idProduit' => $idProduit, ':quantite' => $quantite,':idTaille' => $idTaille));
        }

        public function verifProduitPanier($idUtilisateur, $idProduit, $idTaille) {
            $sql = "SELECT * from panier where (id_utilisateur = :idUtilisateur and id_produit = :idProduit and id_nom_taille_kimono = :idTaille)";
            $verif = $this->bdd->prepare($sql);
            $verif->execute(array(':idUtilisateur' => $idUtilisateur, ':idProduit' => $idProduit, ':idTaille' => $idTaille));
            $verifProduitPanier = $verif->fetchall(\PDO::FETCH_ASSOC);
            return $verifProduitPanier;
        }


        public function panierUtilisateur($idUtilisateur) {
            $sql = "SELECT utilisateurs.id, quantite, panier.id_produit, produits.nom, produits.image1, produits.prix, nom_taille_kimono.nom as taille, id_nom_taille_kimono from panier inner join produits on produits.id = panier.id_produit inner join utilisateurs on panier.id_utilisateur = utilisateurs.id inner join nom_taille_kimono on panier.id_nom_taille_kimono = nom_taille_kimono.id  where utilisateurs.id = :idUtilisateur";
            $selectInfoProduit = $this->bdd->prepare($sql);
            $selectInfoProduit->execute(array(':idUtilisateur' => $idUtilisateur));
            $infoProduit = $selectInfoProduit->fetchall(\PDO::FETCH_ASSOC);
            return $infoProduit;
        }


        public function supprimerPanierUtilisateur($idUtilisateur) {
            $sql = 'DELETE FROM panier WHERE id_utilisateur = :idUtilisateur';
            $supprimerPanier = $this->bdd->prepare($sql);
            $supprimerPanier->execute(array(':idUtilisateur' => $idUtilisateur));
        }


        public function supprimerProduitPanier($idUtilisateur, $idProduit, $idTaille) {
            $sql = 'DELETE FROM panier WHERE id_utilisateur = :idUtilisateur and id_produit = :idProduit and id_nom_taille_kimono = :idTaille';
            $supprimeProduit = $this->bdd->prepare($sql);
            $supprimeProduit->execute(array(':idUtilisateur' => $idUtilisateur, ':idProduit' => $idProduit, ':idTaille' => $idTaille)); 
        }


        public function contenuPanier($idUtilisateur) {
            //$this->idUtilisateur  = $idUtilisateur;
            $sql = 'SELECT panier.id, panier.id_utilisateur, `id_produit`,produits.nom, produits.prix, produits.image1, `quantite`, `id_nom_taille_kimono`, adresses.id as id_adresse, adresses.adresse, adresses.code_postal, adresses.ville, adresses.pays, adresses.num_tel 
            FROM `panier` INNER JOIN produits ON id_produit = produits.id 
            inner join adresses on panier.id_utilisateur = adresses.id_utilisateur where panier.id_utilisateur = :idUtilisateur'; 
            $panier = $this->bdd->prepare($sql);
            $panier->execute(array(':idUtilisateur' => $idUtilisateur)); 
            $panierUtilisateur = $panier->fetchall(\PDO::FETCH_ASSOC);
            return $panierUtilisateur;                      
        } 
    }
?>