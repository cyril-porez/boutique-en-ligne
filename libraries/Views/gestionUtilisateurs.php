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
        <div>
            <button role='button' data-target='#modalCreer' data-toggle='modal' id='connexion-link'>Creer</button>
            <div class="modal" id="modalCreer" role="dialog">
                <div class="modal-content">
                    <div class="modal-close" data-dismiss="dialog">X</div>
                        <div class="modal-body">
                            <!-- </fieldset> -->
                            <fieldset>
                                <form action="" method="post">
                                <legend>Saisir toutes vos informations</legend>
                                    <label for ="nom">NOM :</label>                                                                
                                    <input id="nom" type="text" name="nomCreer" placeholder="nom" />
                                                            
                                    <label for ="prenom">Prénom :</label>
                                    <input id="prenom" type="text" name="prenomCreer" placeholder="Prenom" autocomplete="off">
                        
                                    <label for ="adresse">Adresse :</label>
                                    <input id="adresse" type="text" name="adresseCreer" placeholder="adresse" autocomplete="off">
                        
                                    <label for ="codePostale">CODE POSTALE:</label>                        
                                    <input id="code_postale" type="text" name="code_postaleCreer" placeholder="codePostale" />
                        
                                    <label for ="pays">Pays :</label>                        
                                    <input id="pays" type="text" name="paysCreer" placeholder="pays" />
                        
                                    <label for ="ville">Ville:</label>
                                    <input id="ville" type="text" name="villeCreer" placeholder="ville" />
                                                            
                                    <label for ="numero">N°:</label>
                                    <input id="numero" type="text" name="numeroCreer" placeholder="numero" />
                        
                                    <label for ="email">Email :</label>                        
                                    <input id="email" type="text" name="emailCreer" placeholder="Email" autocomplete="off">
                        
                                    <label for ="motdepasse">  Mot de passe :</label>                        
                                    <input id="motdepasse" type="password" name="mot_de_passeCreer" placeholder="Mot de passe" />
                        
                                    <label for ="conf-mdp">Confirmez le mot de passe :</label>                        
                                    <input id="conf-mdp" type="password" name="CmdpCreer" placeholder="Confirmez le mot de passe" />

                                    <input type="submit" name="button" value="Creer">
                                   
                                    <!-- </fieldset> -->                                                            
                                </form>
                            </fieldset>
                            <?php
                                if(!empty($_POST['nomCreer']) && !empty($_POST['prenomCreer'])  && !empty($_POST['emailCreer']) && !empty($_POST['mot_de_passeCreer']) && !empty($_POST['CmdpCreer']) && !empty($_POST['adresseCreer']) && !empty($_POST['code_postaleCreer']) && !empty($_POST['paysCreer']) && !empty($_POST['villeCreer']) && !empty($_POST['numeroCreer'])) {    
                                    $creerUtilisateur = new \Controllers\Admin();
                                    $creerUtilisateur->creerUtilisateur($_POST['nomCreer'], $_POST['prenomCreer'], $_POST['emailCreer'], $_POST['mot_de_passeCreer'], $_POST['CmdpCreer'], $_POST['adresseCreer'], $_POST['code_postaleCreer'], $_POST['paysCreer'], $_POST['villeCreer'], $_POST['numeroCreer']);
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $j = 0;
                    foreach($afficheUtilisateurs as  $afficheUtilisateur => $value){?>
                        <tr>
                            <td><?= $value['id']; ?></td>
                            <td><?= $value['nom']; ?></td>
                            <td><?= $value['prenom']; ?></td>
                            <td><?= $value['email']; ?></td>
                            <td><?= $value['date']; ?></td>
                            <td>
                                <button class="boutonModal" role='button' data-target='#modal<?= $afficheUtilisateur ?>' data-toggle='modal' id='connexion-link'>Lire</button>
                                    <div class="modal" id="modal<?= $afficheUtilisateur ?>" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body">
                                                    </fieldset> 
                                                    <fieldset>
                                                        <legend>Saisir toutes vos informations</legend>
                                                            <label for ="nom">NOM :</label>                                                                
                                                            <input id="nom" type="text" name="nom" value=<?= $value["nom"] ?> placeholder="nom" />
                                                            
                                                            <label for ="prenom">Prénom :</label>
                                                            <input id="prenom" type="text" name="prenom" value=<?= $value["prenom"] ?> placeholder="Prenom" autocomplete="off">
                        
                                                            <label for ="adresse">Adresse :</label>
                                                            <input id="adresse" type="text" name="adresse" value=<?= $value["adresse"] ?> placeholder="adresse" autocomplete="off">
                        
                                                            <label for ="codePostale">CODE POSTALE:</label>                        
                                                            <input id="code_postale" type="text" name="code_postale" value=<?= $value["code_postale"] ?> placeholder="codePostale" />
                        
                                                            <label for ="pays">Pays :</label>                        
                                                            <input id="pays" type="text" name="pays" value=<?= $value["pays"] ?>   />
                        
                                                            <label for ="ville">Ville:</label>
                                                            <input id="ville" type="text" name="ville" value=<?= $value["ville"] ?> placeholder="ville" />
                                                            
                                                            <label for ="numero">N°:</label>
                                                            <input id="numero" type="text" name="numero" value=<?= $value["num"] ?> placeholder="numero" />
                    
                                                            <label for ="email">Email :</label>                        
                                                            <input id="email" type="text" name="email" value=<?= $value["email"] ?> placeholder="Email" autocomplete="off">
                                                            <!--</fieldset>-->                                                            
                                                        </form>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>            
                                </td>
                            <td>
                            <button role='button' data-target='#modalModif<?= $afficheUtilisateur ?>' data-toggle='modal' id='connexion-link'>Modifier</button>
                                    <div class="modal" id="modalModif<?= $afficheUtilisateur ?>" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body">
                                                    
                                                    <!--<fieldset>-->
                                                       <legend>Saisir toutes vos informations</legend>
                                                        <form>
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
                                                            <!-- </fieldset> -->                                                          
                                                        </form>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                            <td>
                                <button role='button' data-target='#modalSuppr<?= $afficheUtilisateur ?>' data-toggle='modal' id='connexion-link'>Supprimer</button>
                               
                                <div class="modal" id="modalSuppr<?= $afficheUtilisateur ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">
                                                <h3>Supprimer l'utilisateur!</h3>
                                                <p>Voulez-vous supprimer cet utilisateur nom:<?= ' ' . $value["nom"] ?> prenom:<?= ' ' . $value["prenom"] ?> id:<?= ' ' . $value["id"] . '?' ?></p>
                                                <?php
                                                    echo "pfpfpffpfp";
                                                    if (isset($_POST['supprimer']) ) {
                                                        echo "bob";
                                                        $supprime = new \Controllers\Admin();
                                                        $supprime->supprimerUtilsateur($value['id']);                                                       
                                                        //break;
                                                    }
                                                    
                                                ?>                                                
                                                <form action="" method="post">
                                                    <input type="Submit" name="supprimer" value="supprimer">
                                                </form>
                                                
                                            </div>
                                        </div>
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