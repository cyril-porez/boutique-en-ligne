<?php

    namespace Controllers;

    require_once('../autoload.php');
    require_once('function.php');
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

                $nom = protectionDonnées($_POST['nom']);
                $prenom = protectionDonnées($_POST['prenom']);;
                $email = protectionDonnées($_POST['email']);

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
                $mdp = protectionDonnées($_POST['motDePasse']);
                $nmdp = protectionDonnées($_POST['nouveauMotDePasse']);
                $cmdp = protectionDonnées($_POST['confirmeMotDePasse']);
                
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
                $adresse = protectionDonnées($_POST['adresse']);
                $codePostal = protectionDonnées($_POST['codePostal']);
                $ville = protectionDonnées($_POST['ville']);
                $pays = protectionDonnées($_POST['pays']);

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


        public function modifierAdresseFacturation($adresse, $ville, $codePostal, $pays, $idUtilisateur) { 
            
            $erreur = '';

            if (!empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['codePostal']) && !empty($_POST['pays'])) {
                $adresse = protectionDonnées($_POST['adresse']);
                $codePostal = protectionDonnées($_POST['codePostal']);
                $ville = protectionDonnées($_POST['ville']);
                $pays = protectionDonnées($_POST['pays']);

                $this->adresse = $adresse;
                $this->codePostal = $codePostal;
                $this->ville = $ville;
                $this->pays = $pays;
                $this->idUtilisateur = $idUtilisateur;

                $modifierAdresseLivraison = new \Models\Utilisateurs();
                $modifier = $modifierAdresseLivraison->modifierAdresseFacturation($this->adresse, $this->ville, $this->codePostal, $this->pays, $this->idUtilisateur);
                $infoUtilisateur = $modifierAdresseLivraison->selectUtilisateursId($this->idUtilisateur);

                $_SESSION["utilisateurs"][0] =  [
                    'id' => $infoUtilisateur[0]['id'],
                    'nom' => $infoUtilisateur[0]['nom'], 
                    'prenom' => $infoUtilisateur[0]['prenom'], 
                    'email' => $infoUtilisateur[0]['email'],
                    'mot_de_passe' => $infoUtilisateur[0]['mot_de_passe'],
                    'adresse' => $this->adresse,
                    'code_postale' => $this->adresse,
                    'pays' => $this->pays,
                    'ville' => $this->ville,
                    'id_droits' => $infoUtilisateur[0]['id_droits'],
                    'num' => $infoUtilisateur[0]['num'],
                    'token' => $infoUtilisateur[0]['token'],
                    'date' => $infoUtilisateur[0]['date'],
                ]; 
            }
            else if (!empty($_POST['adresse']) || !empty($_POST['ville']) || !empty($_POST['code_postal']) || !empty($_POST['pays'])) {
                $erreur = '* Les champs sont vides';
            }            
            return $erreur;
        }


        public function mettreProduitFavoris($idUtilisateur, $idProduit) {
            $this->idUtilisateur = $idUtilisateur;
            $this->idProduit = $idProduit;
        
            if(isset($_POST['favoris'])) {
               
                $favoris = new \Models\Favoris();
                $nbrFavoris = $favoris->verifProduitFavoris($this->idUtilisateur, $this->idProduit);

                if ($nbrFavoris[0]['nbr_favoris'] == 0) {
                    $favoris->inserProduitsFavoris($idUtilisateur, $idProduit);
                }
                else if ($nbrFavoris[0]['nbr_favoris'] > 0) {
                    $favoris->supprimerProduitFavoris($idUtilisateur, $idProduit);
                }
            }
        }

        public function ajoutPanier($idUtilisateur, $idProduit, $quantite, $idNomTailleKimono) {
            if (isset($_POST['ajout'])) {                
                if (!empty($_POST['taille_produits']) && !empty($_POST['quantité']) > 0) {                    
                    $idNomTailleKimono = $_POST['taille_produits'];
                    $quantite = intval($_POST['quantité']);

                    $panier = new \Models\Panier();
                    $verifProduit = $panier->verifProduitPanier($idUtilisateur, $idProduit, $idNomTailleKimono);
                    
                    if (count($verifProduit) == 0) {                       
                        $panier->ajoutPanier($idUtilisateur, $idProduit, $quantite, $idNomTailleKimono);
                    }
                    else if (count($verifProduit) == 1) {
                        $quantiteBdd = $verifProduit[0]['quantite'];
                        $somme = $quantite + $quantiteBdd;
                        $panier->modifQuantite($idUtilisateur, $idProduit, $somme,  $idNomTailleKimono);
                    }
                }                
            }
        }


        public function supprimePanierUtilisateur() {
            if (isset($_POST['vider'])) {
                $idUtilisateur = $_SESSION['utilisateurs']['0']['id'];
                $supprimer = new \Models\Panier();
                $supprimer->supprimerPanierUtilisateur($idUtilisateur);
                header('Refresh: 0');
                return 0;
            }
        }


        public function supprimerProduitPanier($idUtilisateur, $idProduit, $idTaille) {
            
            if (isset($_POST['supprimer'])) {

                $supprimerProduit = new \Models\Panier();
                $supprimerProduit->supprimerProduitPanier($idUtilisateur, $idProduit, $idTaille);
            }
        }


        public function modifierQuantitePanier($idUtilisateur, $idProduit, $quantite, $idNomTailleKimono) {
            $idNomTailleKimono = $_POST['id_nom_taille_kimono'];
            $idProduit = $_POST['modifierIdProduit'];
            $quantite = intval($_POST['modifQuantite']);

            if (isset($_POST['quantite']) > 0) { 
            
                $panier = new \Models\Panier();
                $verifProduit = $panier->verifProduitPanier($idUtilisateur, $idProduit, $idNomTailleKimono);
                    
                if (count($verifProduit) == 0) {                       
                    $panier->ajoutPanier($idUtilisateur, $idProduit, $quantite, $idNomTailleKimono);
                }
                else if (count($verifProduit) == 1) {
                    $quantiteBdd = $verifProduit[0]['quantite'];
                    $somme = $quantite + $quantiteBdd;
                    $panier->modifQuantite($idUtilisateur, $idProduit, $somme,  $idNomTailleKimono);
                }
            }  
        }
    }
?>