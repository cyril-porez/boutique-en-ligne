<?php
    namespace Models;

    require_once('Model.php');

    class Utilisateurs extends Model {

        


        public function modifierProduit() {
            $sql = "UPDATE UPDATE `produits` SET `id`='[value-1]',`nom`='[value-2]',`reference`='[value-3]',`classe`='[value-4]',`description`='[value-5]',`id_categorie`='[value-6]',`id_sous_categorie`='[value-7]',`prix`='[value-8]',`image1`='[value-9]' WHERE 1";
        }

        public function selectionneProduits() {
            $sql = "SELECT produits.id, produits.nom, produits.reference, produits.classe, produits.description, produits.id_categorie, categories.nom as categorie, produits.id_sous_categorie, sous_categories.nom as sous_categorie, produits.prix, produits.image1 from produits inner join categories ON produits.id_categorie = categories.id inner join sous_categories ON produits.id_sous_categorie = sous_categories.id";
            $requete = $this->bdd->prepare($sql);
            $requete->execute();
            $infoUtilisateurs = $requete->fetchall(\PDO::FETCH_ASSOC);
            return $infoUtilisateurs;
        }


        public function creerUtilisateur($nom, $prenom, $email, $mot_de_passe, $adresse, $code_postale, $pays, $ville, $num) {
            $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, adresse, code_postale, pays, ville, id_droits, num, token, date)  VALUES (:nom, :prenom, :email, :mot_de_passe, :adresse, :code_postale, :pays, :ville, :id_droits, :num, 'null', :date)";
            $date  = date('Y-m-d H:i:s');
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue(":prenom", $prenom, \PDO::PARAM_STR);
            $requete->bindValue(":nom", $nom, \PDO::PARAM_STR);
            $requete->bindValue(":email", $email, \PDO::PARAM_STR);
            $requete->bindValue(":adresse", $adresse, \PDO::PARAM_STR);
            $requete->bindValue(":mot_de_passe", $mot_de_passe, \PDO::PARAM_STR);
            $requete->bindValue(":code_postale", $code_postale, \PDO::PARAM_INT);
            $requete->bindValue(":pays", $pays, \PDO::PARAM_STR);
            $requete->bindValue(":ville", $ville, \PDO::PARAM_STR);
            $requete->bindValue(":num",$num, \PDO::PARAM_STR);
            $requete->bindValue(":id_droits", 1, \PDO::PARAM_INT);
            $requete->bindValue(":date", $date);
            $requete->execute();
        }


        public function modifierUtilisateur($nom, $prenom, $email, $idDroit, $id) {
            $sql = "UPDATE utilisateurs SET nom = :nom , prenom = :prenom, email = :email, id_droits = :idDroits  WHERE id = :idUtilisateur";
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue(":prenom", $prenom, \PDO::PARAM_STR);
            $requete->bindValue(":nom", $nom, \PDO::PARAM_STR);
            $requete->bindValue(":email", $email, \PDO::PARAM_STR);
            $requete->bindValue(":idDroits", $idDroit, \PDO::PARAM_INT);
            $requete->bindValue(":idUtilisateur", $id, \PDO::PARAM_INT);
            $requete->execute();
        }


        public function supprimerUtilsateur($id) {
            $sql = "DELETE FROM `utilisateurs` WHERE id = :id";
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue(":id", $id, \PDO::PARAM_INT);
            $requete->execute();    
        } 


        public function selectionneUtilisateurs() {
            $sql = "SELECT utilisateurs.id, utilisateurs.nom , droits.nom as droit, utilisateurs.prenom, utilisateurs.email, utilisateurs.mot_de_passe, utilisateurs.adresse, utilisateurs.code_postale, utilisateurs.pays, utilisateurs.ville, utilisateurs.num, utilisateurs.id_droits, date, token FROM utilisateurs inner join droits on droits.id = utilisateurs.id_droits order by utilisateurs.id asc";
            $requete = $this->bdd->prepare($sql);
            $requete->execute();
            $infoUtilisateurs = $requete->fetchall(\PDO::FETCH_ASSOC);
            return $infoUtilisateurs;
        }

        public function selectDroitUtilisateur() {
            $sql = "SELECT * from droits";
            $requete = $this->bdd->prepare($sql);
            $requete->execute();
            $droitUtilisateur = $requete->fetchall(\PDO::FETCH_ASSOC);
            return $droitUtilisateur; 
        }


        public function verif_si_existe_deja($email){
            $selection = "SELECT email FROM utilisateurs WHERE email = :email";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':email', $email, \PDO::PARAM_STR);
            $result->execute();
            $recupere = $result->fetchAll();
            return $recupere;
        }  
    }

    /*$modif = new Utilisateurs();
    $modif->modifierUtilisateur('yam', 'cha', 'yacha@gmail.com', 2, 5);*/
?>