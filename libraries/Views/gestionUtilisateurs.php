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
                    foreach($afficheUtilisateurs as  $afficheUtilisateur => $value){?>
                        <tr>
                            <td><?= $value['id']; ?></td>
                            <td><?= $value['nom']; ?></td>
                            <td><?= $value['prenom']; ?></td>
                            <td><?= $value['email']; ?></td>
                            <td><?= $value['date']; ?></td>
                            <td>
                                <button class="boutonModal" role='button' data-target='#modal<?= $afficheUtilisateur ?>' data-toggle='modal' id='connexion-link'>Lire</button>
                                <!-- <a href='#' role='button' data-target='#modal' data-toggle='modal' id='connexion-link'>Se connecter</a> -->
                                    <div class="modal" id="modal<?= $afficheUtilisateur ?>" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body">
                                                    <fieldset>
                                                        <form action="" method="post">                                            
                                                            <label for ="nom">NOM :</label>
                                                            <input id="nom" type="text" name="nom" value=<?=$value["nom"] ?> readonly  />
                                                
                                                            <label for ="prenom">Prénom :</label>
                                                            <input id="prenom" type="text" name="prenom" value=<?=$value["prenom"] ?> autocomplete="off" readonly >
                                                
                                                            <label for ="adresse">Adresse :</label>
                                                            <input id="adresse" type="text" name="adresse" value=<?=$value["adresse"] ?> autocomplete="off" readonly >
                                                
                                                            <label for ="codePostale">CODE POSTALE:</label>
                                                            <input id="code_postale" type="text" value=<?=$value["code_postale"] ?>  readonly  />
                                                
                                                            <label for ="pays">Pays :</label>
                                                            <input id="pays" type="text" name="pays" value=<?=$value["pays"] ?> readonly />
                                                
                                                            <label for ="ville">Ville:</label>
                                                            <input id="ville" type="text" name="ville" value=<?=$value["ville"] ?> readonly  />
                                                
                                                            <label for ="numero">N°:</label>
                                                            <input id="numero" type="text" name="numero" value=<?=$value["num"] ?> readonly  />
                                                
                                                            <label for ="email">Email :</label>
                                                            <input id="email" type="text" name="email" value=<?=$value["email"] ?> autocomplete="off" readonly > 
                                                        </form>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>            
                                </td>
                            <td>
                            <button role='button' data-target='#modalModif<?= $afficheUtilisateur ?>' data-toggle='modal' id='connexion-link'>Modifier</button>
                                <!-- <a href='#' role='button' data-target='#modal' data-toggle='modal' id='connexion-link'>Se connecter</a> -->
                                    <div class="modal" id="modalModif<?= $afficheUtilisateur ?>" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body">
                                                    <fieldset>
                                                        <form action="" method="post">                                            
                                                            <label for ="nom">NOM :</label>
                                                            <input id="nom" type="text" name="nom" value=<?=$value["nom"] ?> />
                                                
                                                            <label for ="prenom">Prénom :</label>
                                                            <input id="prenom" type="text" name="prenom" value=<?=$value["prenom"] ?> autocomplete="off">
                                                
                                                            <label for ="adresse">Adresse :</label>
                                                            <input id="adresse" type="text" name="adresse" value=<?=$value["adresse"] ?> autocomplete="off">
                                                
                                                            <label for ="codePostale">CODE POSTALE:</label>
                                                            <input id="code_postale" type="text" value=<?=$value["code_postale"] ?> />
                                                
                                                            <label for ="pays">Pays :</label>
                                                            <input id="pays" type="text" name="pays" value=<?=$value["pays"] ?> />
                                                
                                                            <label for ="ville">Ville:</label>
                                                            <input id="ville" type="text" name="ville" value=<?=$value["ville"] ?> />
                                                
                                                            <label for ="numero">N°:</label>
                                                            <input id="numero" type="text" name="numero" value=<?=$value["num"] ?> />
                                                
                                                            <label for ="email">Email :</label>
                                                            <input id="email" type="text" name="email" value=<?=$value["email"] ?> autocomplete="off"> 

                                                            <button>Modifier</button>
                                                            
                                                        </form>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                            <td>
                                <button role='button' data-target='#modalSuppr<?= $afficheUtilisateur ?>' data-toggle='modal' id='connexion-link'>Supprimer</button>
                                <!-- <a href='#' role='button' data-target='#modal' data-toggle='modal' id='connexion-link'>Se connecter</a> -->
                                <div class="modal" id="modalSuppr<?= $afficheUtilisateur ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">
                                                <h3>Supprimer l'utilisateur!</h3>
                                                <p>Voulez-vous supprimer cet utilisateur nom:<?= ' ' . $value["nom"] ?> prenom:<?= ' ' . $value["prenom"] ?> id:<?= ' ' . $value["id"] . '?' ?></p>
                                                <?php
                                                    echo "pfpfpffpfp";
                                                    if (isset($_POST['supprimer' . $j])) {
                                                        echo "bob";
                                                        $supprime = new \Controllers\Admin();
                                                        $supprime->supprimerUtilsateur($value['id']);
                                                        header('Refresh: 0');
                                                        break;
                                                    }
                                                ?>                                                
                                                <form action="" method="post">
                                                    <button name='supprimer'>Supprimer</button>
                                                </form>
                                                <!--<button>Annuler</button>-->
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