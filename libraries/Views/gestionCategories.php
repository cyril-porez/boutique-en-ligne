<?php
    require_once('../Controllers/Categorie.php');
    require_once('../Controllers/SousCategorie.php');

    $Categorie = new \Controllers\Categorie();
    $afficheCategories = $Categorie->selectCategorie();
    //var_dump($afficheCategories);
    $sousCategorie = new \Controllers\SousCategorie();
    $afficheSousCategories = $sousCategorie->selectSousCategorie();    
    //var_dump($afficheSousCategories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modal.css">
    <script src="js/script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
       <!--<button role='button' data-target='#modalCreer' data-toggle='modal' id='connexion-link'>Creer une Categorie</button>
        <div class="modal" id="modalCreer" role="dialog">
            <div class="modal-content">
                <div class="modal-close" data-dismiss="dialog">X</div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <label for="nom">nom</label>
                            <input type="text"  name="nom">
                            <label for="classe">classe</label>
                            <select name="classe">
                                <option >Choisissez une option</option>
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                                <option value="enfant">Enfant</option>
                                <option value="Sport">Sport</option>
                            </select>
                            <input type="submit" value="creer">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom</th>                   
                    <th>Classe</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $j = 0;
                    foreach($afficheCategories as  $afficheCategorie => $value) {?>
                        <tr>
                            <td><?=$value['id'] ?></td>
                            <td><?=$value['nom'] ?></td>
                            <td><?=$value['genre'] ?></td>
                            <td>
                                <button role='button' data-target='#modalModif<?= $afficheCategorie ?>' data-toggle='modal' id='connexion-link'>Modifier</button>
                                <div class="modal" id="modalModif<?= $afficheCategorie ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">                                                
                                                    
                                                <label for="nom">nom:</label>
                                                <input type="text"  name="nom" value=<?= $value['nom'] ?>>
                                            
                                                <label for="classe">classe:</label>
                                                <select name="classe">                                
                                                    
                                                    <option ><?= $value['genre'] ?></option>
                                                    <option value="homme">Homme</option>
                                                    <option value="femme">Femme</option>
                                                    <option value="enfant">Enfant</option>
                                                    <option value="Sport">Sport</option>
                                                </select>
                                                <input type="submit" value="creer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button role='button' data-target='#modalSuppr<?= $afficheCategorie ?>' data-toggle='modal' id='connexion-link'>Supprimer</button>
                                <div class="modal" id="modalSuppr<?= $afficheCategorie ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">
                                                <h3>Supprimer le produits!</h3>
                                                <p>Voulez-vous supprimer cet utilisateur nom:<?= ' ' . $value["nom"] ?> genre:<?= ' ' . $value['genre'] ?> id:<?= ' ' . $value["id"] . '?' ?></p>
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
        </table>-->


        <button role='button' data-target='#modalCreer' data-toggle='modal' id='connexion-link'>Creer une Sous-Categorie</button>
        <div class="modal" id="modalCreer" role="dialog">
            <div class="modal-content">
                <div class="modal-close" data-dismiss="dialog">X</div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <label for="nom">nom</label>
                            <input type="text"  name="nom">

                            <select name="categorie">
                                <option value="choisir" name="choose">Choisir une sous-catégorie d'article</option>
                                    <?php
                                        foreach($afficheCategories as $afficheCategorie) {
                                            echo "<option value=".$afficheCategorie["id"].">" .$afficheCategorie["nom"]. "</option>";
                                        }
                                    ?>
                                </select>
                            
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
                    <th>Sous-Categorie</th>                   
                    <th>Categorie</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $j = 0;
                    foreach($afficheSousCategories as  $afficheSousCategorie => $sousCategorie) {?>
                        <tr>
                            <td><?= $sousCategorie['id'] ?></td>
                            <td><?= $sousCategorie['sous_categorie'] ?></td>
                            <td><?= $sousCategorie['categorie'] ?></td>
                            <td>
                                <button role='button' data-target='#modalModif<?= $afficheSousCategorie ?>' data-toggle='modal' id='connexion-link'>Modifier</button>
                                <div class="modal" id="modalModif<?= $afficheSousCategorie ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">                                                
                                                <form action="" method="post">
                                                    <label for="nom">nom</label>
                                                    <input type="text"  name="nom" value=<?= $sousCategorie['sous_categorie'] ?>>

                                                    <select name="categorie">
                                                        <option value="choisir" name="choose">Choisir une catégorie d'article</option>
                                                        <?php
                                                            foreach($afficheCategories as $afficheCategorie) {
                                                                echo "<option value=".$afficheCategorie["id"].">" .$afficheCategorie["nom"]. "</option>";
                                                            }
                                                        ?>
                                                    </select>
                            
                                                    <input type="submit" value="creer">
                                                </form>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button role='button' data-target='#modalSuppr<?= $afficheSousCategorie ?>' data-toggle='modal' id='connexion-link'>Supprimer</button>
                                <div class="modal" id="modalSuppr<?= $afficheSousCategorie ?>" role="dialog">
                                    <div class="modal-content">
                                        <div class="modal-close" data-dismiss="dialog">X</div>
                                            <div class="modal-body">
                                                <h3>Supprimer le produits!</h3>
                                                <p>Voulez-vous supprimer la sous-categorie:<?= ' ' . $sousCategorie["sous_categorie"] ?> appartenant à la categorie:<?= ' ' . $sousCategorie['categorie'] ?> id:<?= ' ' . $sousCategorie["id"] . '?' ?></p>
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
    </main>
    </main>
    <footer>

    </footer>
</body>
</html>