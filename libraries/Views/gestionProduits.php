<?php
    require_once('../Controllers/admin.php');
    require_once('../Controllers/Produits.php');
    require_once('../Models/Produits.php');

    $produits = new \Models\Produits;
    $fetchCategories = $produits->recuperation_de_donnee();
   
    $fetchSousCategories = $produits->recuperation_de_donnee2();

    $produits = new \Models\Utilisateurs();
    $afficheProduits = $produits->selectionneProduits();
    
    if(!empty($_POST['nomCreer']) && !empty($_POST['referenceCreer']) && !empty($_POST['classeCreer']) && !empty($_POST['descriptionCreer']) && !empty($_POST['categorieCreer']) && !empty($_POST['sous-categorieCreer']) && !empty($_POST['prixCreer'])){
        $creerProduit = new \Controllers\Produits();
        $creerProduit->creerProduit($_POST['nomCreer'], $_POST['referenceCreer'], $_POST['classeCreer'], $_POST['descriptionCreer'], $_POST['categorieCreer'], $_POST['sous-categorieCreer'], $_POST['prixCreer'], $filename);
        header("Refresh: 0");
    }  

    if(!empty($_POST['nomModifier']) && !empty($_POST['referenceModifier']) && !empty($_POST['classeModifier']) && !empty($_POST['descriptionModifier']) && !empty($_POST['categorieModifier']) && !empty($_POST['sous-categorieModifier']) && !empty($_POST['prixModifier'])){
        var_dump($_POST['nomModifier']);
        $creerProduit = new \Controllers\Produits();
        $creerProduit->modifierProduit($_POST['nomModifier'], $_POST['referenceModifier'], $_POST['classeModifier'], $_POST['descriptionModifier'], $_POST['categorieModifier'], $_POST['sous-categorieModifier'], $_POST['prixModifier'], $filename, $_POST["modifierProduits"]);
       // header("Refresh: 0");
    }  

    if (isset($_POST['supprimer']) ) {
        if(isset($_POST['supprimerProduit'])){
            $supprime = new \Controllers\Admin();
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
    <link rel="stylesheet" href="css/gestion.css">
    <script src="js/script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <a href="admin.php"><button>retour</button></a>
            <button role='button' data-target='#modalCreer' data-toggle='modal' id='connexion-link'>Creer un Produit</button>
            <div class="modal" id="modalCreer" role="dialog">
                <div class="modal-content">
                    <div class="modal-close" data-dismiss="dialog">X</div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <label for="nomCreer">nom</label>
                                <input type="text"  name="nomCreer">

                                <label for="referenceCreer">reference</label>
                                <input  name="referenceCreer">

                                <label for="description">description</label>
                                <input type="text" name="descriptionCreer">

                                <label for="classeCreer">classe:</label>
                                <select name="classeCreer">
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                    <option value="Enfant">Enfant</option>
                                    <option value="Sport">Sport</option>
                                </select>

                                <select name="categorieCreer">
                                    <option value="choose" name="choose">Choisir une catégorie d'article</option>
                                    <option>
                                        <?php
                                            foreach($fetchCategories as $value) {
                                                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
                                            }
                                        ?>
                                    </option>
                                </select>

                                <select name="sous-categorieCreer">
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
                                 <input type="file" name="telechargerImage">

                                <label for="prix">prix</label>
                                <input type="text" name="prixCreer">

                                <input type="submit" value="creer">
                            </form>                            
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
                                <button class="bouton-lire" role='button' data-target='#modal<?= $afficheProduit ?>' data-toggle='modal' id='connexion-link'>Lire</button>
                                    <div class="modal" id="modal<?= $afficheProduit ?>" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-close" data-dismiss="dialog">X</div>
                                                <div class="modal-body-descritpion">
                                                    <img src=<?= $value['image1'] ?> alt="image">
                                                    <form action="" method="post" enctype="multipart/form-data">

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
                            <button class="bouton-modif" role='button' data-target='#modalModif<?= $afficheProduit ?>' data-toggle='modal' id='connexion-link'>Modifier</button>
                                <div class="modal" id="modalModif<?= $afficheProduit ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">
                                                <form action="" method="post" enctype="multipart/form-data">                                                        
                                                    <label for="nomModifier">nom</label>
                                                    <input type="text"  name="nomModifier" value=<?= $value['nom'] ?>>

                                                    <label for="referenceModifier">reference</label>
                                                    <input  name="referenceModifier" value=<?= $value['reference'] ?> >

                                                    <label for="descriptionModifier">description</label>
                                                    <input type="text" name="descriptionModifier" value=<?= $value['description'] ?>>

                                                    <label for="classeModifier">classe:</label>
                                                    <select name="classeModifier"> 
                                                    <option value="<?= $value['classe'] ?>"><?= $value['classe'] ?></option>
                                                        <option value="Homme">Homme</option>
                                                        <option value="Femme">Femme</option>
                                                        <option value="Enfant">Enfant</option>
                                                        <option value="Sport">Sport</option>
                                                    </select>

                                                    <label for="categorieModifier">categorie:</label>
                                                    <select name="categorieModifier"> 
                                                        <option value=<?= $value['id_categorie'] ?>><?= $value['categorie'] ?></option>                                                       
                                                        <option>
                                                            <?php
                                                                foreach($fetchCategories as $fetchCategorie) {
                                                                    echo "<option value=".$fetchCategorie["id"]. ">" . $fetchCategorie["nom"]. "</option>";
                                                                }
                                                            ?>
                                                        </option>
                                                    </select>

                                                    <select name="sous-categorieModifier">
                                                        <option value="<?= $value['id_sous_categorie'] ?>"><?= $value['sous_categorie'] ?></option>                                                        
                                                        <option>
                                                            <?php
                                                                foreach($fetchSousCategories as $fetchSousCategorie) {
                                                                    echo "<option value=".$fetchSousCategorie["id"].">" . $fetchSousCategorie["nom"] . "</option>";
                                                                }
                                                            ?>
                                                        </option>
                                                    </select>

                                                    <label for="telechargerImage">image</label>
                                                    <input type="file" name="telechargerImage" value=<?= $value['image1'] ?>>

                                                    <label for="prixModifier">prix</label>
                                                    <input type="text" name="prixModifier" value=<?= $value['prix'] ?>>

                                                    <input type="submit" value="Modifier">
                                                    <input type='hidden' name='modifierProduits' value='<?= $value['id']?>'>
                                                </form>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button class="bouton-suprr" role='button' data-target='#modalSuppr<?= $afficheProduit ?>' data-toggle='modal' id='connexion-link'>Supprimer</button>
                                <div class="modal" id="modalSuppr<?= $afficheProduit ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">
                                                <h3>Supprimer le produits!</h3>
                                                <p>Voulez-vous supprimer cet utilisateur nom:<?= ' ' . $value["nom"] ?> reference:<?= ' ' . $value['reference'] ?> id:<?= ' ' . $value["id"] . '?' ?></p>
                                                <form action="" method="post">
                                                    <button class="bouton-suprr"type="Submit" name="supprimer">supprimer</button>
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