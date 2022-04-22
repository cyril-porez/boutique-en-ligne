<?php
        namespace Controllers;
        require_once("../Models/Utilisateurs.php");
    
        class Inscription {
        
                public function inscription() {
                        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['adresse']) && !empty($_POST['code_postale']) && !empty($_POST['pays']) && !empty($_POST['ville']) && !empty($_POST['numero'])) {
                                $nom = htmlspecialchars($_POST['nom']);
                                $prenom = htmlspecialchars($_POST['prenom']);
                                $email = htmlspecialchars($_POST['email']);
                                $mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);
                                $confMotDePasse = htmlspecialchars($_POST['Cmdp']);
                                $adresse = htmlspecialchars($_POST['adresse']);
                                $codePostale = htmlspecialchars($_POST['code_postale']);
                                $pays = htmlspecialchars($_POST['pays']);
                                $ville = htmlspecialchars($_POST['ville']);
                                $numero = htmlspecialchars($_POST['numero']);
                
                                $utilisateur = new \Models\Utilisateurs();
                                $recupere = $utilisateur->verif_si_existe_deja($email);
                                $erreur = '';
                                
                                if($mot_de_passe == $confMotDePasse) {
                                        $mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);
                                        if(count($recupere) == 0) {
                                                $utilisateur->register($nom, $prenom, $email, $mot_de_passe, $adresse, $codePostale, $pays, $ville, $numero);
                                                header("Location: connexion.php");
                                        }
                                        else {
                                                $erreur = "compte deja existant avec cette email";
                                        }
                                }
                                else {
                                        $erreur = "les mot de passe ne sont pas identique";
                                }                
                        }
                        elseif (isset($nom) || isset($prenom) || isset($email) || isset($mot_de_passe) || isset($adresse) ||
                        isset($codePostale) || isset($pays) || isset($ville) || isset($numero) ) {
                                $erreur = "champs vide";
                        }
                        return $erreur;
                }
        }

// }





