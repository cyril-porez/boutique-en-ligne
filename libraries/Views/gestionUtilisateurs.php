<?php

    require_once('../Controllers/Admin.php');

    $utilsateurs = new \Controllers\Admin();
    $afficheUtilisateurs = $utilsateurs->selectionneUtilisateurs();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestionUtilisateurs.css">
    <link rel="stylesheet" href="modal.css">
    <script src="js/script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>     
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>article</th>
                    <th>nom</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $j = 0;
                    foreach($afficheUtilisateurs as $afficheUtilisateur){ /*var_dump($afficheUtilisateur);*/ ?>
                        <tr>
                            <td><?= $afficheUtilisateur['id']; ?></td>
                            <td><?= $afficheUtilisateur['nom']; ?></td>
                            <td><?= $afficheUtilisateur['prenom']; ?></td>
                            <td><?= $afficheUtilisateur['email']; ?></td>
                            <td><?= $afficheUtilisateur['date']; ?></td>
                            <td>
                                <button role='button' data-target='#modal' data-toggle='modal' id='connexion-link'>dcfvgbh</button>
                                <!-- <a href='#' role='button' data-target='#modal' data-toggle='modal' id='connexion-link'>Se connecter</a> -->
                                    <div class="modal" id="modal" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body">
                                                    <form action="" method="post">                                            
                                                        <label for ="nom">NOM :</label>
                                                        <input id="nom" type="text" name="nom" value=<?= $afficheUtilisateur["nom"] ?> />
                                            
                                                        <label for ="prenom">Prénom :</label>
                                                        <input id="prenom" type="text" name="prenom" value=<?= $afficheUtilisateur["prenom"] ?> autocomplete="off">
                                            
                                                        <label for ="adresse">Adresse :</label>
                                                        <input id="adresse" type="text" name="adresse" value=<?= $afficheUtilisateur["adresse"] ?> autocomplete="off">
                                            
                                                        <label for ="codePostale">CODE POSTALE:</label>
                                                        <input id="code_postale" type="text" value=<?= $afficheUtilisateur["code_postale"] ?> />
                                            
                                                        <label for ="pays">Pays :</label>
                                                        <input id="pays" type="text" name="pays" value=<?= $afficheUtilisateur["pays"] ?> />
                                            
                                                        <label for ="ville">Ville:</label>
                                                        <input id="ville" type="text" name="ville" value=<?= $afficheUtilisateur["ville"] ?> />
                                            
                                                        <label for ="numero">N°:</label>
                                                        <input id="numero" type="text" name="numero" value=<?= $afficheUtilisateur["num"] ?> />
                                            
                                                        <label for ="email">Email :</label>
                                                        <input id="email" type="text" name="email" value=<?= $afficheUtilisateur["email"] ?> autocomplete="off"> 
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>            
                                </td>
                            <td>
                                <div class="box">
                                    <button>Modifier</button>
                                    <div class="modal">
                                        <form action="" method="post">
                                            <fieldset>
                                                <label for ="nom">NOM :</label>
                                                <input id="nom" type="text" name="nom" placeholder="nom" />
                                                <label for ="prenom">Prénom :</label>
                                                <input id="prenom" type="text" name="prenom" placeholder="Prenom" autocomplete="off">
                                                <label for ="adresse">Adresse :</label>
                                                <input id="adresse" type="text" name="adresse" placeholder="adresse" autocomplete="off">
                                                <label for ="codePostale">CODE POSTALE:</label>
                                                <input id="code_postale" type="text" name="code_postale" placeholder="codePostale" />
                                                <label for ="pays">Pays :</label>
                                                <input id="pays" type="text" name="pays" placeholder="pays" />
                                                <label for ="ville">Ville:</label>
                                                <input id="ville" type="text" name="ville" placeholder="ville" />
                                                <label for ="numero">N°:</label>
                                                <input id="numero" type="text" name="numero" placeholder="numero" />
                                                <label for ="email">Email :</label>
                                                <input id="email" type="text" name="email" placeholder="Email" autocomplete="off">
                                                <label for ="motdepasse">  Mot de passe :</label>
                                                <input id="motdepasse" type="password" name="mot_de_passe" placeholder="Mot de passe" />
                                                <label for ="conf-mdp">Confirmez le mot de passe :</label>
                                                <input id="conf-mdp" type="password" name="Cmdp" placeholder="Confirmez le mot de passe" />
                                                <button>Modifier</button>
                                            </fieldset>
                                        </form>
                                        <span>FERMER</span>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <div class="box">
                                    <button>supprimer</button>
                                    <div class="modal">
                                        <h3>Supprimer l'utilisateur!</h3>
                                        <p>Voulez-vous supprimer cet utilisateur nom:<?= ' ' . $afficheUtilisateur["nom"] ?> prenom:<?= ' ' . $afficheUtilisateur["prenom"] ?> id:<?= ' ' . $afficheUtilisateur["id"] ?></p>
                                        <button>Supprimer</button>
                                        <button>Annuler</button>
                                    </div>
                                </div>  
                            </td>
                        </tr>
                        <?php
                        $j++;
                    }
                ?>
            </tbody>
        </table>
    </main>
    <footer>

    </footer>    
</body>
</html>