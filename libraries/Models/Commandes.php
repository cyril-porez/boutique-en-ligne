<?php

    namespace Models; 

    require_once('Model.php');

    class Commandes extends Model{

        public function inserCommandes( $reference, $idUtilisateur) {
            $sql = 'INSERT into commandes (numero, `id_utilisateur`)
            VALUES (:reference, :idUtilisateur)';
            $inserer = $this->bdd->prepare($sql);
            $inserer->execute(array(':reference' => $reference,
                                    ':idUtilisateur' => $idUtilisateur,
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
            $sql = "SELECT * from commandes where commandes.id_utilisateur = :id_utilisateur order by commandes.id desc";
            $resultat = $this->bdd->prepare($sql);
            $resultat->execute(array(':id_utilisateur' => $idUtilisateur));
            $historique = $resultat->fetchall(\PDO::FETCH_ASSOC);
            return $historique;
        }
    }
?>