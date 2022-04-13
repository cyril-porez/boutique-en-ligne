<?php
    namespace Models;

    require_once('Model.php');

    class Admin extends Model {

        


        public function modifierProduit() {
            $sql = "UPDATE UPDATE `produits` SET `id`='[value-1]',`nom`='[value-2]',`reference`='[value-3]',`classe`='[value-4]',`description`='[value-5]',`id_categorie`='[value-6]',`id_sous_categorie`='[value-7]',`prix`='[value-8]',`image1`='[value-9]' WHERE 1";
        }

        public function selectionneProduits() {
            $sql = "SELECT * FROM produits";
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


        public function modifierUtilisateur($id) {
            $sql = "UPDATE utilisateurs SET nom = :nom , prenom = :prenom, email = :email, mot_de_passe = :motDEPasse, adresse = :adresse, code_postale = :codePostale, pays = :pays, ville = :ville, id_droits = :idDroits, num = :num  WHERE id = :id";         
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
            $requete->bindValue(":num",$num, \PDO::PARAM_INT);
            $requete->bindValue(":id_droits", 1, \PDO::PARAM_INT);
            $requete->execute();
        }


        public function supprimerUtilsateur($id) {
            $sql = "DELETE FROM `utilisateurs` WHERE :id";
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue(":id", $id, \PDO::PARAM_INT);
            $requete->execute();     
        } 


        public function selectionneUtilisateurs() {
            $sql = "SELECT * FROM utilisateurs";
            $requete = $this->bdd->prepare($sql);
            $requete->execute();
            $infoUtilisateurs = $requete->fetchall(\PDO::FETCH_ASSOC);
            return $infoUtilisateurs;
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

    /*$user = new \Models\Admin();
    $user->creerUtilisateur('lo', 'la', '$email', '$mot_de_passe', '$mot_de_passe' ,'$adresse', 58741, '$pays', '$ville', 'num');*/
?>