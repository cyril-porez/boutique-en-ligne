<?php

    namespace Controllers;

    require_once('../Models/Utilisateurs.php');
    
    class Utilisateurs {

        protected $mdp;
        protected $nmdp;
        protected $cmdp;

        public function modifierMotDePasse($mdp, $nmdp, $cmdp) {
            if (!empty($_POST['nouveauMotDePasse']) && !empty($_POST['confirmeMotDePasse'])) {
                $this->mdp = $mdp;
                $this->cmdp = $cmdp;
                $erreur = "";
                             
                if(password_verify($mdp, $_SESSION['utilisateurs']['mot_de_passe'])) {
                    
                    if ($mdp == $cmdp) {
                        $hash = password_hash($mdp, PASSWORD_DEFAULT);
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