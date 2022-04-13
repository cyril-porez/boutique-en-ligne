<?php
    require_once('../Controllers/admin.php');

    $produits = new \Models\Admin();
    $afficheProduits = $produits->selectionneProduits();
    var_dump($afficheProduits);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestionProduits.css">
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <label for="nom">nom</label>
                                <input type="text"  name="nom">

                                <label for="reference">reference</label>
                                <input  name="reference">

                                <label for="classe">classe</label>
                                <select name="classe">
                                    <option >Choisissez une option</option>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                    <option value="enfant">Enfant</option>
                                    <option value="Sport">Sport</option>
                                </select>

                                <label for="description">description</label>
                                <input type="text" name="description">

                                <select name="categorie">
                                    <option value="choose" name="choose">Choisir une catégorie d'article</option>
                                    <option>
                                        <?php
                                            /*foreach($fetchCategories as $value) {
                                                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                                            }*/
                                        ?>
                                    </option>
                                </select>

                                <select name="sous-categorie">
                                    <option value="choose" name="choose">Choisir une sous-catégorie d'article</option>
                                    <option>
                                        <?php
                                            /*foreach($fetchSousCategories as $value) {
                                                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                                            }*/
                                        ?>
                                    </option>
                                </select>

                                <label for="image">image</label>
                                 <input type="file" name="telecharger_image">

                                <label for="prix">prix</label>
                                <input type="text" name="prix">

                                <input type="submit" value="creer">
                            </form>
                                    
                           
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
                    <th>Reference</th>
                    <th>Classe</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $j = 0;
                    foreach($afficheProduits as  $afficheProduit => $value) {?>
                        <tr>
                            <td><?=$value['id'] ?></td>
                            <td><?=$value['nom'] ?></td>
                            <td><?=$value['reference'] ?></td>
                            <td><?=$value['classe'] ?></td>
                            <td><?=$value['prix'] ?></td>
                            <td>
                                <button class="boutonModal" role='button' data-target='#modal<?= $afficheProduit ?>' data-toggle='modal' id='connexion-link'>Lire</button>
                                    <div class="modal" id="modal<?= $afficheProduit ?>" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body">
                                                    </fieldset> 
                                                    <fieldset>
                                                        
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>            
                                </td>
                            <td>
                            <button role='button' data-target='#modalModif<?= $afficheProduit ?>' data-toggle='modal' id='connexion-link'>Modifier</button>
                                    <div class="modal" id="modalModif<?= $afficheProduit ?>" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body">
                                                    
                                                    <!--<fieldset>-->
                                                       <legend>Saisir toutes vos informations</legend>
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
                                <button role='button' data-target='#modalSuppr<?= $afficheProduit ?>' data-toggle='modal' id='connexion-link'>Supprimer</button>
                               
                                <div class="modal" id="modalSuppr<?= $afficheProduit ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">
                                                <h3>Supprimer le produits!</h3>
                                                <p>Voulez-vous supprimer cet utilisateur nom:<?= ' ' . $value["nom"] ?> prenom:<?= ' ' . $value["reference"] ?> id:<?= ' ' . $value["id"] . '?' ?></p>
                                                <?php
                                                    
                                                    if (isset($_POST['supprimer']) ) {
                                                        
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