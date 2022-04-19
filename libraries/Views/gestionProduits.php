<?php
    require_once('../Controllers/admin.php');
    require_once('../Controllers/Produits.php');
    require_once('../Models/Produits.php');

    $produits = new \Models\Produits;
    $fetchCategories = $produits->recuperation_de_donnee();
    //var_dump($fetchCategories);
    $fetchSousCategories = $produits->recuperation_de_donnee2();

    $produits = new \Models\Utilisateurs();
    $afficheProduits = $produits->selectionneProduits();
    //var_dump($afficheProduits);

    if (isset($_POST['supprimer']) ) {
        if(isset($_POST['supprimerProduit'])){
            $supprime = new \Controllers\Utilisateurs();
            $supprime->supprimerProduit($_POST['supprimerProduit']);
            header("Refresh: 0");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gestionUtilisateurs.css">
    <link rel="stylesheet" href="css/modal.css">
    <script src="js/script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <button role='button' data-target='#modalCreer' data-toggle='modal' id='connexion-link'>Creer un Produit</button>
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
                                            foreach($fetchCategories as $value) {
                                                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                                            }
                                        ?>
                                    </option>
                                </select>

                                <select name="sous-categorie">
                                    <option value="choose" name="choose">Choisir une sous-catégorie d'article</option>
                                    <option>
                                        <?php
                                            foreach($fetchSousCategories as $value) {
                                                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                                            }
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
                                    $creerUtilisateur = new \Controllers\utilisateurs();
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
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <img src=<?= $value['image1'] ?> alt="image">
                                                        
                                                        <label for="nom">nom</label>
                                                        <input type="text"  name="nom" value=<?= $value['nom'] ?> readonly>

                                                        <label for="reference">reference</label>
                                                        <input  name="reference"  value=<?= $value['reference'] ?> readonly>

                                                        <label for="classe">classe</label>
                                                        <input name="classe" value=<?= $value['classe'] ?> readonly >

                                                        <label for="description">description</label>
                                                        <input type="text" name="description" value=<?= $value['description'] ?> readonly>

                                                        <label for="categorie">categorie</label>
                                                        <input type="text" name="categorie" value=<?= $value['categorie'] ?> readonly>

                                                        <label for="categorie">sous-categorie</label>
                                                        <input type="text" name="categorie" value=<?= $value['sous_categorie'] ?> readonly>

                                                        <label for="prix">prix</label>
                                                        <input type="text" name="prix" value=<?= $value['prix'] . "€" ?> readonly>                                                            
                                                    </form>                                                   
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
                                                <fieldset>
                                                    <legend>Saisir toutes vos informations</legend>
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        
                                                        <label for="nom">nom</label>
                                                        <input type="text"  name="nom" value=<?= $value['nom'] ?>>

                                                        <label for="reference">reference</label>
                                                        <input  name="reference">

                                                        <label for="classe">classe</label>
                                                        <select name="classe">
                                                            <option>Choisissez une option</option>
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
                                                                    foreach($fetchCategories as $fetchCategorie) {
                                                                        echo "<option value=".$fetchCategorie["id"].">" .$fetchCategorie["nom"]. "</option>";
                                                                    }
                                                                ?>
                                                            </option>
                                                        </select>

                                                        <select name="sous-categorie">
                                                            <option value="choose" name="choose">Choisir une sous-catégorie d'article</option>
                                                            <option>
                                                                <?php
                                                                    foreach($fetchSousCategories as $fetchSousCategorie) {
                                                                        echo "<option value=".$fetchSousCategorie["id"].">" . $fetchSousCategorie["nom"] . "</option>";
                                                                    }
                                                                ?>
                                                            </option>
                                                        </select>

                                                        <label for="image">image</label>
                                                        <input type="file" name="telecharger_image">

                                                        <label for="prix">prix</label>
                                                        <input type="text" name="prix">

                                                        <input type="submit" value="creer">
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
                                                <p>Voulez-vous supprimer cet utilisateur nom:<?= ' ' . $value["nom"] ?> reference:<?= ' ' . $value['reference'] ?> id:<?= ' ' . $value["id"] . '?' ?></p>
                                                                                            
                                                <form action="" method="post">
                                                    <input type="Submit" name="supprimer" value="supprimer">
                                                    <input type='hidden' name='supprimerProduit' value='<?= $value['id']?>'>

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