<?php
    namespace Controllers;
    
    require_once('../Models/Admin.php');

    class Admin {

        public function selectionneUtilisateurs() {
            $utilisateurs = new \Models\Admin();
            $infoUtilisateurs = $utilisateurs->selectionneUtilisateurs();
            return $infoUtilisateurs;
        }


        public function modifierUtilisateur($id) {

        }


        public function supprimerUtilsateur($id) {
            $supprimer = new \Models\Admin();
            $supprimerUtilisateurs = $supprimer->supprimerUtilsateur($id);
            return $supprimerUtilisateurs;
        }

        public function creerUtilisateur($nom, $prenom, $email, $mot_de_passe, $confMotDePasse,  $adresse, $codePostale, $pays, $ville, $numero) {
            if(!empty($_POST['nomCreer']) && !empty($_POST['prenomCreer']) && !empty($_POST['emailCreer']) && !empty($_POST['mot_de_passeCreer']) && !empty($_POST['CmdpCreer']) && !empty($_POST['adresseCreer']) && !empty($_POST['code_postaleCreer']) && !empty($_POST['paysCreer']) && !empty($_POST['villeCreer']) && !empty($_POST['numeroCreer'])) {
                echo "passe";
                $nom = htmlspecialchars($_POST['nomCreer']);
                $prenom = htmlspecialchars($_POST['prenomCreer']);
                $email = htmlspecialchars($_POST['emailCreer']);
                $mot_de_passe = htmlspecialchars($_POST['mot_de_passeCreer']);
                $confMotDePasse = htmlspecialchars($_POST['CmdpCreer']);
                $adresse = htmlspecialchars($_POST['adresseCreer']);
                $codePostale = htmlspecialchars($_POST['code_postaleCreer']);
                $pays = htmlspecialchars($_POST['paysCreer']);
                $ville = htmlspecialchars($_POST['villeCreer']);
                $numero = htmlspecialchars($_POST['numeroCreer']);
            
                $utilisateur = new \Models\Admin();
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
            $utilisateurs = new \Models\Admin();
            $infoUtilisateurs = $utilisateurs->selectionneProduits();
            return $infoUtilisateurs;
        }
    }

    /*$user = new \Controllers\Admin();*
    $user->creerUtilisateur('yo', 'ya', 'q@gmail.com', '$mot_de_passe', '$mot_de_passe' ,'$adresse', 58471, '$pays', '$ville', 'num');*/
?>