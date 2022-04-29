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
        
        public function register($nom, $prenom, $email, $mot_de_passe, $adresse, $code_postale, $pays, $ville, $num) {
            echo "bob";
            $requete = $this->bdd->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, adresse, code_postale, pays, ville, id_droits, num, token, date)  VALUES (:nom, :prenom, :email, :mot_de_passe, :adresse, :code_postale, :pays, :ville, :id_droits, :num, 'null', :date)");
            $date  = date('Y-m-d H:i:s');
            $requete->bindValue(":prenom", $prenom, \PDO::PARAM_STR);
            $requete->bindValue(":nom", $nom, \PDO::PARAM_STR);
            $requete->bindValue(":email", $email, \PDO::PARAM_STR);
            $requete->bindValue(":adresse", $adresse, \PDO::PARAM_STR);
            $requete->bindValue(":mot_de_passe", $mot_de_passe, \PDO::PARAM_STR);
            $requete->bindValue(":code_postale", $code_postale, \PDO::PARAM_INT);
            $requete->bindValue(":pays", $pays, \PDO::PARAM_STR);
            $requete->bindValue(":ville", $ville, \PDO::PARAM_STR);
            $requete->bindValue(":num",$num, \PDO::PARAM_INT);
            $requete->bindValue(":id_droits", 2, \PDO::PARAM_INT);
            $requete->bindValue(":date", $date);
            $requete->execute();
        }
        
        //connecter utilisateur
    
        public function verifEmail($email){
            $requete2 = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
            $requete2->bindValue(":email", $email, \PDO::PARAM_STR);
            $requete2 ->execute();
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
            $requete->bindValue(":idUtilisateur", $id, \PDO::PARAM_STR);
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


        public function verif_si_existe_deja($email) {
            $selection = "SELECT email FROM utilisateurs WHERE email = :email";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':email', $email, \PDO::PARAM_STR);
            $result->execute();
            $recupere = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $recupere;
        }  

        public function selectUtilisateursId($id) {
            $selection = "SELECT * FROM utilisateurs WHERE id = :id";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':id', $id, \PDO::PARAM_INT);
            $result->execute();
            $recuperer_tout = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $recuperer_tout;
        } 


        public function modifierMotDePasse($mdp) {
            $idUtilisateur = $_SESSION["utilisateurs"][0]["id"];
            $this->mdp = $mdp;
            $sql = "UPDATE utilisateurs SET mot_de_passe = :password where id = :id";
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue(':password', $this->mdp, \PDO::PARAM_STR);
            $requete->bindValue(':id', $idUtilisateur, \PDO::PARAM_INT);
            $requete->execute();
        }


        public function modifierUtilisateurs($nom, $prenom, $email) {
            $idUtilisateur = $_SESSION["utilisateurs"][0]["id"];
            
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;

            $sql = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email where id = :id"; 
            $requete = $this->bdd->prepare($sql);
            $requete->bindValue(':nom', $this->nom, \PDO::PARAM_STR);
            $requete->bindValue(':prenom', $this->prenom, \PDO::PARAM_STR);
            $requete->bindValue(':email', $this->email, \PDO::PARAM_STR);
            $requete->bindValue(':id', $idUtilisateur, \PDO::PARAM_INT);
            $requete->execute(); 
        }


        public function modifierAdresseFacturation($adresse, $ville, $codePostal, $pays, $idUtilisateur) {
            $this->adresse = $adresse;
            $this->codePostal = $codePostal;
            $this->ville = $ville;
            $this->pays = $pays;
            $this->idUtilisateur = $idUtilisateur;

            $sql = "UPDATE utilisateurs SET adresse = :adresse, code_postale = :codePostal, pays = :pays, ville = :ville WHERE id = :idUtilisateur";
            $result = $this->bdd->prepare($sql);
            $result->bindValue(':adresse', $this->adresse, \PDO::PARAM_STR);
            $result->bindValue(':codePostal', $this->codePostal, \PDO::PARAM_STR);
            $result->bindValue(':ville', $this->ville, \PDO::PARAM_STR);
            $result->bindValue(':pays', $this->pays, \PDO::PARAM_STR);
            $result->bindValue(':idUtilisateur', $this->idUtilisateur, \PDO::PARAM_STR);            
            return $result->execute();
        }
    }
?>