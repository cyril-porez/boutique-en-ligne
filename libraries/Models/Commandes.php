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
                                    ':idAdresse' => $idAdresse));
        }


        public function verifCommandeExiste($referenceCommande) {
            $sql = 'SELECT * from commandes where numero = :referenceCommande';
            $verif = $this->bdd->prepare($sql);
            $verif->execute(array(':referenceCommande' => $referenceCommande));
            $verifCommande = $verif->fetchall(\PDO::FETCH_ASSOC);
            return $verifCommande;
        }
    }
?>