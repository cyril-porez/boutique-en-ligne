<?php

    namespace Controllers;

    require_once('../Models/Utilisateurs.php');
    
    class Utilisateurs {

        protected $mdp;
        protected $nmdp;
        protected $cmdp;

        protected $nom;
        protected $prenom;
        protected $email;

        protected $adresse;
        protected $codePostal;
        protected $ville;
        protected $pays;
        protected $idUtilisateur;


        public function modifierUtilisateurs($nom, $prenom, $email) {
            if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email'])) {

                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);

                $erreur = '';     
    
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->email = $email;

                $id = $_SESSION['utilisateurs'][0]['id'];
                
                $verifEmail = new \Models\Utilisateurs();
                $countEmail = $verifEmail->verifEmail($this->email);
                   
                if (count($countEmail) == 0 || count($countEmail) == 1) {
                    $updateLogin = new \Models\Utilisateurs();
                    $updateLogin->modifierUtilisateurs($this->nom, $this->prenom, $this->email);
                    $infoUser = $updateLogin->selectUtilisateursId($id);
                    $_SESSION["utilisateurs"][0] =  [
                                            'id' => $infoUser[0]['id'],
                                            'nom' => $this->nom, 
                                            'prenom' => $this->prenom, 
                                            'email' => $this->email,
                                            'mot_de_passe' => $infoUser[0]['mot_de_passe'],
                                            'adresse' => $infoUser[0]['adresse'],
                                            'code_postale' => $infoUser[0]['code_postale'],
                                            'pays' => $infoUser[0]['pays'],
                                            'ville' => $infoUser[0]['ville'],
                                            'id_droits' => $infoUser[0]['id_droits'],
                                            'num' => $infoUser[0]['num'],
                                            'token' => $infoUser[0]['token'],
                                            'date' => $infoUser[0]['date'],
                                        ];  
                }
                else {
                    $erreurr = "* Ce login existe déjà !";
                }
                return $erreur;
            }
        }


        public function modifierMotDePasse() {
            if (!empty($_POST['motDePasse']) && !empty($_POST['nouveauMotDePasse']) && !empty($_POST['confirmeMotDePasse'])) {
                $mdp = htmlspecialchars($_POST['motDePasse']);
                $nmdp = htmlspecialchars($_POST['nouveauMotDePasse']);
                $cmdp = htmlspecialchars($_POST['confirmeMotDePasse']);
                
                $this->mdp = $mdp;
                $this->nmdp = $nmdp;
                $this->cmdp = $cmdp;

                $erreur = "";
                        
                if(password_verify($mdp, $_SESSION['utilisateurs'][0]['mot_de_passe'])) {
                    
                    if ($nmdp == $cmdp) {
                        $hash = password_hash($nmdp, PASSWORD_DEFAULT);
                        $modifMdp = new \Models\Utilisateurs();
                        $modifMdp->modifierMotDePasse($hash);
                    }
                    else {
                        $erreur = "* Mot de passe et confirme mot de passe !";
                    }
                }
                else {
                    $erreur = "* votre mot de passe ne correspond pas";
                }                
            }            
            return $erreur;
        }


        public function modifierAdresseLivraison($adresse, $ville, $codePostal, $pays, $idUtilisateur) {

            $erreur = '';

            if (!empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['codePostal']) && !empty($_POST['pays'])) {
                $adresse = htmlspecialchars($_POST['adresse']);
                $codePostal = htmlspecialchars($_POST['codePostal']);
                $ville = htmlspecialchars($_POST['ville']);
                $pays = htmlspecialchars($_POST['pays']);

                $this->adresse = $adresse;
                $this->codePostal = $codePostal;
                $this->ville = $ville;
                $this->pays = $pays;
                $this->idUtilisateur = $idUtilisateur;

                $modifierAdresseLivraison = new \Models\Adresses();
                $modifier = $modifierAdresseLivraison->modifierAdresseLivraison($this->adresse, $this->ville, $this->codePostal, $this->pays, $this->idUtilisateur);
            }
            else if (!empty($_POST['adresse']) || !empty($_POST['ville']) || !empty($_POST['code_postal']) || !empty($_POST['pays'])) {
                $erreur = '* Les champs sont vides';
            }            
            return $erreur;
        }
    }
?>