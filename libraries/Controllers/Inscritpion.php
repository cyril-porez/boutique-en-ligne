<?php
        namespace Controllers;
        require_once("../Models/Utilisateurs.php");
        require_once("function.php");

        class Inscription {

                public function inscription() {
                        $erreur = '';

                        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['adresse']) && !empty($_POST['code_postale']) && !empty($_POST['pays']) && !empty($_POST['ville']) && !empty($_POST['numero'])) {
                                $nom = protectionDonnées($_POST['nom']);
                                $prenom = protectionDonnées($_POST['prenom']);
                                $email = protectionDonnées($_POST['email']);
                                $mot_de_passe = protectionDonnées($_POST['mot_de_passe']);
                                $confMotDePasse = protectionDonnées($_POST['Cmdp']);
                                $adresse = protectionDonnées($_POST['adresse']);
                                $codePostale = protectionDonnées($_POST['code_postale']);
                                $pays = protectionDonnées($_POST['pays']);
                                $ville = protectionDonnées($_POST['ville']);
                                $numero = protectionDonnées($_POST['numero']);
                                

                                $utilisateur = new \Models\Utilisateurs();
                                $recupere = $utilisateur->verif_si_existe_deja($email);
                               var_dump($recupere);

                                if($mot_de_passe == $confMotDePasse) {
                                        echo "droit ";
                                        $mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);
                                        if(count($recupere) == 0) {
                                                echo "test";
                                                $utilisateur->creer_utilisateur($nom, $prenom, $email, $mot_de_passe, $adresse, $codePostale, $pays, $ville, $numero);
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
                        isset($codePostale) || isset($pays) || isset($ville) || isset($numero)) {
                                $erreur = "champs vide";
                        }
                        return $erreur;
                }
        }
?>