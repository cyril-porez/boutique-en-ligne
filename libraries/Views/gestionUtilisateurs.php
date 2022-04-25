<?php

    require_once('../Controllers/Admin.php');

    $_SESSION['test'] = 0;

    $utilisateurs = new \Controllers\Admin();
    $afficheUtilisateurs = $utilisateurs->selectionneUtilisateurs();
    $droitsUtilisateur =$utilisateurs->selectDroitUtilisateur();

    if(!empty($_POST['nomCreer']) && !empty($_POST['prenomCreer'])  && !empty($_POST['emailCreer']) && !empty($_POST['mot_de_passeCreer']) && !empty($_POST['CmdpCreer']) && !empty($_POST['adresseCreer']) && !empty($_POST['code_postaleCreer']) && !empty($_POST['paysCreer']) && !empty($_POST['villeCreer']) && !empty($_POST['numeroCreer'])) {
        $creerUtilisateur = new \Controllers\Admin();
        $creerUtilisateur->creerUtilisateur($_POST['nomCreer'], $_POST['prenomCreer'], $_POST['emailCreer'], $_POST['mot_de_passeCreer'], $_POST['CmdpCreer'], $_POST['adresseCreer'], $_POST['code_postaleCreer'], $_POST['paysCreer'], $_POST['villeCreer'], $_POST['numeroCreer']);
        header("Refresh: 0");
    }

    if (isset($_POST['supprimer']) ) {
        if(isset($_POST['deleteUser'])){
            $supprime = new \Controllers\Admin();
            $supprime->supprimerUtilsateur($_POST['deleteUser']);
            header("Refresh: 0");
        }
    }


    if(!empty($_POST['nomModifier']) && !empty($_POST['prenomModifier']) && !empty($_POST['emailModifier']) && !empty($_POST['droitModifier'])) {
       
        $inscription = new \Controllers\Admin();
        $inscription->modifierUtilisateur($_POST['nomModifier'], $_POST['prenomModifier'], $_POST['emailModifier'], $_POST['droitModifier'], $_POST['modifierUtilisateur']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gestion.css">
    <!-- <link rel="stylesheet" href="css/modal.css"> -->
    <script src="js/script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <a href="admin.php"><button>retour</button></a>
            <button role='button' data-target='#modalCreer' data-toggle='modal' id='connexion-link'>Creer un utilisateur</button>
            <div class="modal" id="modalCreer" role="dialog">
                <div class="modal-content">
                    <div class="modal-close" data-dismiss="dialog">X</div>
                        <div class="modal-body">
                            <!-- </fieldset> -->
                            <!-- <fieldset> -->
                                <form action="" method="post">
                                <!-- <legend>Saisir toutes vos informations</legend> -->
                                <table class = "modal-form">
                                    <tbody>
                                        <tr>
                                            <td><label for ="nom">NOM :</label></td>
                                            <td><input id="nom" type="text" name="nomCreer" placeholder="nom" /></td>
                                        </tr>
                                        <tr>
                                            <td><label for ="prenom">Prénom :</label></td>
                                            <td><input id="prenom" type="text" name="prenomCreer" placeholder="Prenom" autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td><label for ="adresse">Adresse :</label></td>
                                            <td><input id="adresse" type="text" name="adresseCreer" placeholder="adresse" autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td><label for ="codePostale">CODE POSTALE:</label></td>
                                            <td><input id="code_postale" type="text" name="code_postaleCreer" placeholder="codePostale" /></td>
                                        </tr>
                                        <tr>
                                            <td><label for ="pays">Pays :</label></td>
                                            <td><input id="pays" type="text" name="paysCreer" placeholder="pays" /></td>
                                        </tr>
                                        <tr>
                                            <td><label for ="ville">Ville:</label></td>
                                            <td><input id="ville" type="text" name="villeCreer" placeholder="ville" /></td>
                                        </tr>
                                        <tr>
                                            <td><label for ="numero">N°:</label></td>
                                            <td><input id="numero" type="text" name="numeroCreer" placeholder="numero" /></td>
                                        </tr>
                                        <tr>
                                            <td><label for ="email">Email :</label></td>
                                            <td><input id="email" type="text" name="emailCreer" placeholder="Email" autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td><label for ="motdepasse">  Mot de passe :</label></td>
                                            <td><input id="motdepasse" type="password" name="mot_de_passeCreer" placeholder="Mot de passe" /></td>
                                        </tr>
                                        <tr>
                                            <td><label for ="conf-mdp">Confirmez le mot de passe :</label></td>
                                            <td><input id="conf-mdp" type="password" name="CmdpCreer" placeholder="Confirmez le mot de passe" /></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <button type="submit" name="button">Creer</button>
                                </form>
                            <!-- </fieldset> -->
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
                                <button class="bouton-lire" role='button' data-target='#modal<?= $afficheUtilisateur ?>' data-toggle='modal' id='connexion-link'>Lire</button>
                                    <div class="modal" id="modal<?= $afficheUtilisateur ?>" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
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
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            <td>
                            <button class="bouton-modif"role='button' data-target='#modalModif<?= $afficheUtilisateur ?>' data-toggle='modal' id='connexion-link'>Modifier</button>
                                    <div class="modal" id="modalModif<?= $afficheUtilisateur ?>" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body">
                                                       <form action="" method="post">
                                                            <label for ="nom">NOM :</label>
                                                            <input id="nom" type="text" name="nomModifier" value=<?= $value["nom"] ?> placeholder="nom" />

                                                            <label for ="prenom">Prénom :</label>
                                                            <input id="prenom" type="text" name="prenomModifier" value=<?= $value["prenom"] ?> placeholder="Prenom" autocomplete="off">


                                                            <label for ="email">Email :</label>
                                                            <input id="email" type="text" name="emailModifier" value=<?= $value["email"] ?> placeholder="Email" autocomplete="off">

                                                            <label for ="droit">Droit :</label>
                                                            <!--<input id="droit" type="text" name="droitModifier" value=<?= $value["id_droits"] ?> placeholder="droit" autocomplete="off">-->

                                                            <select name="droitModifier" id="droit">
                                                                <option value=<?= $value['id_droits'] ?>><?= $value['droit'] ?></option>
                                                                <?php
                                                                    foreach($droitsUtilisateur as $droitUtilisateur) {
                                                                        echo "<option value=".$droitUtilisateur["id"].">" .$droitUtilisateur["nom"]. "</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                            <button class="bouton-modif"type="submit">modifier</button>
                                                            <input type='hidden' name='modifierUtilisateur' value='<?= $value['id']?>'>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                            <td>
                                <button class="bouton-suprr"role='button' data-target='#modalSuppr<?= $afficheUtilisateur ?>' data-toggle='modal' id='connexion-link'>Supprimer</button>
                                <div class="modal" id="modalSuppr<?= $afficheUtilisateur ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">
                                                <h3>Supprimer l'utilisateur!</h3>
                                                <p>Voulez-vous supprimer cet utilisateur nom:<?= ' ' . $value["nom"] ?> prenom:<?= ' ' . $value["prenom"] ?> id:<?= ' ' . $value["id"] . '?' ?></p>
                                                <form action="" method="post">
                                                <button class="bouton-suprr" type="Submit" name="supprimer">supprimer</button>
                                                    <input type='hidden' name='deleteUser' value='<?= $value['id']?>'>
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