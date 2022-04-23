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
            $error = '';            
            $this->login = $login;
            $selectLogin = new \Models\RegisterAuth();
            $count = $selectLogin->selectCountLogin($this->login);
               
            if ($count == 0) {
                $updateLogin = new \Models\User();
                $updateLogin->updateLogin($this->login);
                $infoUser = $updateLogin->infoUser($this->login);
                $_SESSION["user"] = [
                                        'id' => $infoUser['id'], 
                                        'login' => $this->login, 
                                        'password' => $infoUser['password'],
                                    ];  
            }
            else {
                $error = "* Ce login existe déjà !";
            }
            return $error;
        }


        public function modifierMotDePasse() {
            if (!empty($_POST['motDePasse']) && !empty($_POST['nouveauMotDePasse']) && !empty($_POST['confirmeMotDePasse'])) {
                $mdp = htmlspecialchars($_POST['motDePasse']);
                $nmdp = htmlspecialchars($_POST['nouveauMotDePasse']);
                $cmdp = htmlspecialchars($_POST['confirmeMotDePasse']);
                
                $this->mdp = $mdp;
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