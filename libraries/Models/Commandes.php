<?php

    namespace Models; 

    require_once('Model.php');

    class Commandes extends Model{

        public function inserCommandes( $reference, $prix, $prixTotal, $idProduit, $idUtilisateur, $idAdresse) {
            $sql = 'INSERT into commandes (numero, `prix_produit`, `prix_total`, `id_produit`, `id_utilisateur`, `id_adresse`)
            VALUES (:reference, :prix, :prixTotal, :idProduit, :idUtilisateur, :idAdresse)';
            $inserer = $this->bdd->prepare($sql);
            $inserer->execute(array(':reference' => $reference,
                                    ':prix' => $prix,
                                    ':prixTotal' => $prixTotal,
                                    ':idProduit' => $idProduit,
                                    ':idUtilisateur' => $idUtilisateur,
                                    ':idAdresse' => $idAdresse,
                                ));
        }


        public function verifCommandeExiste($referenceCommande) {
            $sql = 'SELECT * from commandes where numero = :referenceCommande';
            $verif = $this->bdd->prepare($sql);
            $verif->execute(array(':referenceCommande' => $referenceCommande));
            $verifCommande = $verif->fetchall(\PDO::FETCH_ASSOC);
            return $verifCommande;
        }
        public function historiqueCommandes($idUtilisateur) {
            $sql = "SELECT *, adresses.adresse, produits.nom, produits.reference, produits.description, produits.image1 from commandes inner join adresses on commandes.id_adresse = adresses.id inner join produits on commandes.id_produit = produits.id where commandes.id_utilisateur = :id_utilisateur order by commandes.id desc";
            $resultat = $this->bdd->prepare($sql);
            $resultat->execute(array(':id_utilisateur' => $idUtilisateur));
            $historique = $resultat->fetchall(\PDO::FETCH_ASSOC);
            return $historique;
        }
    }
?>