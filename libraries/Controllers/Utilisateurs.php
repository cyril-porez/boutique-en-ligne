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
    }
?>