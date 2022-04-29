<?php

    namespace Models; 

    require_once('Model.php');

    class Commandes extends Model{

        public function inserCommandes( $reference, $prix, $prixTotal, $idProduit, $idUtilisateur, $idAdresse, $nom, $adresse, $code_postal, $image) {
            $sql = 'INSERT into commandes (numero, `prix_produit`, `prix_total`, `id_produit`, `id_utilisateur`, `id_adresse`, `nom`, `adresse`, `code_postal`, `image`)
            VALUES (:reference, :prix, :prixTotal, :idProduit, :idUtilisateur, :idAdresse, :nom, :adresse, :code_postal, :image)';
            $inserer = $this->bdd->prepare($sql);
            $inserer->execute(array(':reference' => $reference,
                                    ':prix' => $prix,
                                    ':prixTotal' => $prixTotal,
                                    ':idProduit' => $idProduit,
                                    ':idUtilisateur' => $idUtilisateur,
                                    ':idAdresse' => $idAdresse,
                                     ':nom' => $nom,
                                     ':adresse' => $adresse,
                                     ':code_postal' => $code_postal,
                                     ':image' => $image,
                                ));
        }


        public function verifCommandeExiste($referenceCommande) {
            $sql = 'SELECT * from commandes where numero = :referenceCommande';
            $verif = $this->bdd->prepare($sql);
            $verif->execute(array(':referenceCommande' => $referenceCommande));
            $verifCommande = $verif->fetchall(\PDO::FETCH_ASSOC);
            return $verifCommande;
        }
        public function historiqueCommandes($idUtilisateur){
            $sql = "SELECT * from commandes where id_utilisateur = :idUtilisateur order by id desc";
            $resultat = $this->bdd->prepare($sql);
            $resultat->execute(array(':idUtilisateur' => $idUtilisateur));
            $historique = $resultat->fetchall(\PDO::FETCH_ASSOC);
            return $historique;
        }
    }
?>