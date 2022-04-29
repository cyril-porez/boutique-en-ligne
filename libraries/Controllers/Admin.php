<?php
    namespace Controllers;
    
    require_once('../Models/Utilisateurs.php');
    require_once('../Models/SousCategorie.php');
    require_once('../Models/Categorie.php');
    require_once('../Models/SousCategorie.php');
    require_once('../Models/Produits.php');
    require_once('function.php');

    class Admin {

        public function selectionneUtilisateurs() {
            $utilisateurs = new \Models\Utilisateurs();
            $infoUtilisateurs = $utilisateurs->selectionneUtilisateurs();
            return $infoUtilisateurs;
        }


        public function modifierUtilisateur($nom, $prenom, $email, $droit, $id) {
            if(!empty($_POST['nomModifier']) && !empty($_POST['prenomModifier']) && !empty($_POST['emailModifier']) && !empty($_POST['droitModifier'])) {
                echo "blabla";
                $nom = protectionDonnées($_POST['nomModifier']);
                $prenom = protectionDonnées($_POST['prenomModifier']);
                $email = protectionDonnées($_POST['emailModifier']);
                /*$mot_de_passe = protectionDonnées($_POST['mot_de_passeModifier']);
                $confMotDePasse = protectionDonnées($_POST['CmdpModifier']);*/
                $droit = protectionDonnées($_POST['droitModifier']);
                
        
                $utilisateur = new \Models\Utilisateurs();
                $recupere = $utilisateur->verif_si_existe_deja($email);
                $erreur = '';
                        
                //if($mot_de_passe == $confMotDePasse) {
                  
                   //$mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);
                    if(count($recupere) == 0) {
                        echo "passe";
                        $utilisateur->modifierUtilisateur($nom, $prenom, $email, $droit, $id);
                    }
                    else {
                        $erreur = "compte deja existant avec cette email";
                    }
                /*}
                else {
                    $erreur = "les mot de passe ne sont pas identique";
                }*/              
            }
            elseif (isset($nom) || isset($prenom) || isset($email) || isset($mot_de_passe) || isset($adresse) ||
            isset($codePostale) || isset($pays) || isset($ville) || isset($numero) ) {
                $erreur = "champs vide";
            }
            return $erreur;
        }


        public function supprimerUtilsateur($id) {
            $supprimer = new \Models\Utilisateurs();
            $supprimerUtilisateur = $supprimer->supprimerUtilsateur($id);
            return $supprimerUtilisateur;
        }

        public function supprimerProduit($id) {
            $supprimer = new \Models\Produits();
            $supprimerProduit = $supprimer->supprimerProduit($id);
            return $supprimerProduit;
        }

        public function supprimerCategorie($id) {
            $supprimer = new \Models\Categorie();
            $supprimerCategorie = $supprimer->supprimerCategorie($id);
            return $supprimerCategorie;
        }

        public function supprimerSousCategorie($id) {
            $supprimer = new \Models\SousCategorie();
            $supprimerSousCategorie = $supprimer->supprimerSousCategorie($id);
            return $supprimerSousCategorie;
        }


        public function creerUtilisateur($nom, $prenom, $email, $mot_de_passe, $confMotDePasse,  $adresse, $codePostale, $pays, $ville, $numero) {
            if(!empty($_POST['nomCreer']) && !empty($_POST['prenomCreer']) && !empty($_POST['emailCreer']) && !empty($_POST['mot_de_passeCreer']) && !empty($_POST['CmdpCreer']) && !empty($_POST['adresseCreer']) && !empty($_POST['code_postaleCreer']) && !empty($_POST['paysCreer']) && !empty($_POST['villeCreer']) && !empty($_POST['numeroCreer'])) {
                echo "passe";
                $nom = protectionDonnées($_POST['nomCreer']);
                $prenom = protectionDonnées($_POST['prenomCreer']);
                $email = protectionDonnées($_POST['emailCreer']);
                $mot_de_passe = protectionDonnées($_POST['mot_de_passeCreer']);
                $confMotDePasse = protectionDonnées($_POST['CmdpCreer']);
                $adresse = protectionDonnées($_POST['adresseCreer']);
                $codePostale = protectionDonnées($_POST['code_postaleCreer']);
                $pays = protectionDonnées($_POST['paysCreer']);
                $ville = protectionDonnées($_POST['villeCreer']);
                $numero = protectionDonnées($_POST['numeroCreer']);

                $utilisateur = new \Models\Utilisateurs();
                $recupere = $utilisateur->verif_si_existe_deja($email);
                $erreur = '';

                if($mot_de_passe == $confMotDePasse) {
                    echo "passe2";
                    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);
                    if(count($recupere) == 0) {
                        echo "passe3";
                        $utilisateur->creerUtilisateur($nom, $prenom, $email, $mot_de_passe, $adresse, $codePostale, $pays, $ville, $numero);
                        
                    }
                    else {
                        $erreur = "compte deja existant avec cette email";
                    }
                }
                else {
                    $erreur = "les mot de passe ne sont pas identique";
                }                
            }
            else if (isset($nom) || isset($prenom) || isset($email) || isset($mot_de_passe) || isset($adresse) ||
                isset($codePostale) || isset($pays) || isset($ville) || isset($numero) ) {
                $erreur = "champs vide";
            }
            return $erreur;
        }


        public function selectionneProduits() {
            $utilisateurs = new \Models\Utilisateurs();
            $infoUtilisateurs = $utilisateurs->selectionneProduits();
            return $infoUtilisateurs;
        }


        public function selectDroitUtilisateur() {
            $droits = new \Models\Utilisateurs();
            $droitUtilisateur = $droits->selectDroitUtilisateur();
            return $droitUtilisateur;
        }
    }
?>