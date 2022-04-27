<?php
    namespace Models;

    require_once('Model.php');

    class Panier extends Model {


        protected $idUtilisateur;
        protected $idProduit;
        protected $quantite;
        protected $idNomTailleKimono;

        public function ajoutPanier($idUtilisateur, $idProduit, $quantite, $idNomTailleKimono) {
            $sql = "INSERT INTO panier (id_utilisateur, id_produit, quantite, id_nom_taille_kimono) VALUES (:idUtilisateur, :idProduit, :quantite, :idNomTailleKimono)";
            $ajout = $this->bdd->prepare($sql);
            $ajout->execute(array(':idUtilisateur' => $idUtilisateur, ':idProduit' => $idProduit, ':quantite' => (int) $quantite, ':idNomTailleKimono' => $idNomTailleKimono));
        }

        public function modifQuantite($idUtilisateur, $idProduit, $quantite,  $idTaille) {
            $sql = "UPDATE panier SET quantite = :quantite WHERE id_utilisateur = :idUtilisteur and id_produit = :idProduit and id_nom_taille_kimono = :idTaille";
            $modifierQuantite = $this->bdd->prepare($sql);
            $modifierQuantite->execute(array(':idUtilisteur' => $idUtilisateur, ':idProduit' => $idProduit, ':quantite' => $quantite,':idTaille' => $idTaille));
        }

        public function verifProduitPanier($idUtilisateur, $idProduit, $idTaille) {
            var_dump($idTaille);
            $sql = "SELECT * from panier where (id_utilisateur = :idUtilisateur and id_produit = :idProduit and id_nom_taille_kimono = :idTaille)";
            $verif = $this->bdd->prepare($sql);
            $verif->execute(array(':idUtilisateur' => $idUtilisateur, ':idProduit' => $idProduit, ':idTaille' => $idTaille));
            $verifProduitPanier = $verif->fetchall(\PDO::FETCH_ASSOC);
            return $verifProduitPanier;
        }


        public function panierUtilisateur($idUtilisateur) {
            $sql = "SELECT utilisateurs.id, quantite, produits.nom, produits.image1, produits.prix, nom_taille_kimono.nom as taille from panier inner join produits on produits.id = panier.id_produit inner join utilisateurs on panier.id_utilisateur = utilisateurs.id inner join nom_taille_kimono on panier.id_nom_taille_kimono = nom_taille_kimono.id  where utilisateurs.id = :idUtilisateur";
            $selectInfoProduit = $this->bdd->prepare($sql);
            $selectInfoProduit->execute(array(':idUtilisateur' => $idUtilisateur));
            $infoProduit = $selectInfoProduit->fetchall(\PDO::FETCH_ASSOC);
            return $infoProduit;
        }

        public function supprimerPanierUtilisateur($idUtilisateur) {
            $sql = 'DELETE FROM `panier` WHERE id_utilisateur = :idUtilisateur';
            $selectInfoProduit = $this->bdd->prepare($sql);
            $selectInfoProduit->execute(array(':idUtilisateur' => $idUtilisateur));
        }
    }

    $panier = new \Models\Panier();
    $panier->supprimerPanierUtilisateur(5);
?>