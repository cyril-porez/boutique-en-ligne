<?php
    namespace Models;
    
    require_once('Model.php');
    
    class Utilisateurs extends Model {
        //propriétés

        protected $mdp;
        protected $nom;
        protected $prenom;
        protected $email;

        protected $idUtilisateur;
        protected $adresse;
        protected $codePostal;
        protected $ville;
        protected $pays;
        
        //constructeurs
        /*public function __construct(){
            parent::__construct($this->bdd);
        }*/
        //méthodes
        //enregistrer utilisateur
        
        //connecter utilisateur
    
        public function verifEmail($email){
            $requete2 = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
            $requete2 ->execute(array(':email' => $email));
            $recuperer = $requete2->fetchAll(\PDO::FETCH_ASSOC);
            return $recuperer;
        }


        public function selectionneProduits() {
            $sql = "SELECT produits.id, produits.nom, produits.reference, produits.classe, produits.description, produits.id_categorie, categories.nom as categorie, produits.id_sous_categorie, sous_categories.nom as sous_categorie, produits.prix, produits.image1 from produits inner join categories ON produits.id_categorie = categories.id inner join sous_categories ON produits.id_sous_categorie = sous_categories.id";
            $requete = $this->bdd->prepare($sql);
            $requete->execute();
            $infoUtilisateurs = $requete->fetchall(\PDO::FETCH_ASSOC);
            return $infoUtilisateurs;
        }


        public function creer_utilisateur($nom, $prenom, $email, $mot_de_passe, $adresse, $code_postale, $pays, $ville, $num) {
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


        public function modifierUtilisateur($nom, $prenom, $id_droit, $id_utilisateur) {
            $sql = "UPDATE utilisateurs SET nom = :nom , prenom = :prenom, id_droits = :idDroits  WHERE id = :idUtilisateur";
            $requete = $this->bdd->prepare($sql);
            $requete->execute(array(':prenom' => $prenom, ':nom' => $nom, ':id_droits' => $id_droit, ':id_utilisateur' => $id_utilisateur));
        }


        public function supprimerUtilsateur($id) {
            $sql = "DELETE FROM `utilisateurs` WHERE id = :id";
            $requete = $this->bdd->prepare($sql);
            $requete->execute(array(':id' => $id));    
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


        public function verif_si_existe_deja($email) {
            $selection = "SELECT email FROM utilisateurs WHERE email = :email";
            $result = $this->bdd->prepare($selection);
            $result->execute(array(':email' => $email));
            $recupere = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $recupere;
        }  

        public function selectUtilisateursId($id) {
            $selection = "SELECT * FROM utilisateurs WHERE id = :id";
            $result = $this->bdd->prepare($selection);
            $result->execute(array(array(':id' => $id)));
            $recuperer_tout = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $recuperer_tout;
        } 


        public function modifierMotDePasse($mdp) {
            $id_utilisateur = $_SESSION["utilisateurs"][0]["id"];
            $this->mdp = $mdp;
            $sql = "UPDATE utilisateurs SET mot_de_passe = :password where id = :id";
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue(':password', $this->mdp, \PDO::PARAM_STR);
            $requete->bindValue(':id', $id_utilisateur, \PDO::PARAM_INT);
            $requete->execute(array(':password' => $this->mdp, ':id' => $id_utilisateur));
        }


        public function modifierUtilisateurs($nom, $prenom, $email) {
            $id_utilisateur = $_SESSION["utilisateurs"][0]["id"];
            
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;

            $sql = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email where id = :id"; 
            $requete = $this->bdd->prepare($sql);
            $requete->execute(array(':prenom' => $this->nom, ':email' => $this->email, ':id' => $id_utilisateur)); 
        }


        public function modifierAdresseFacturation($adresse, $ville, $codePostal, $pays, $idUtilisateur) {
            $this->adresse = $adresse;
            $this->codePostal = $codePostal;
            $this->ville = $ville;
            $this->pays = $pays;
            $this->idUtilisateur = $idUtilisateur;

            $sql = "UPDATE utilisateurs SET adresse = :adresse, code_postale = :codePostal, pays = :pays, ville = :ville WHERE id = :idUtilisateur";
            $result = $this->bdd->prepare($sql);         
            $result->execute(array(':adresse' => $this->adresse, ':ville' => $this->ville, ':pays' => $this->pays, ':id_utilisateur' => $this->id_utilisateur));
        }
    }
?>