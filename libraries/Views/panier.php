<?php
    require_once('../Controllers/Panier.php');
    require_once('../Controllers/Utilisateurs.php');

    session_start();

    $idUtilisateur = $_SESSION['utilisateurs'][0]['id'];
    $panier = new \Controllers\Panier();
    $supprimerPanier = new \Controllers\Utilisateurs();

    if (isset($_POST['supprimer'])) {
        $supprimerPanier->supprimerProduitPanier($idUtilisateur, $_POST['supprimeProduit'], $_POST['id_nom_taille_kimono']);
    }

    $panierUtilisateurs = $panier->panierUtilisateur();
    // var_dump($panierUtilisateurs);

    $sousTotal = 0;
    $supprimerPanier->supprimePanierUtilisateur();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <header>
    </header>
    <main>
        <section id="grand-container">
            <?php
                if (!empty($panierUtilisateurs)) {?>

                    <div class="articles-panier">
                    <h1>MON PANIER</h1>
                        <table>
                            <thead>
                                <th class="article">Article</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Sous-total</th>
                            </thead>
                            <tbody>
                            <?php

                                $j = 0;
                                foreach ($panierUtilisateurs as $panierUtilisateur => $value) {?>
                                    <div class="produit-ajouter">
                                        <tr>
                                            <td class="article">
                                                <img src="<?= $value['image1'] ?>" alt="">
                                            </td>
                                            <td>
                                                <div>
                                                    <h4><?= $value['nom'] ?></h4>
                                                    <p><?= 'Taille :' . ' ' . $value['taille'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <p><?= $value['prix'] . ' ' . '€' ?></p>
                                            </td>
                                            <td>
                                                <input type="number" name="quantite" min=0 value='<?= $value['quantite'] ?>'>
                                            </td>
                                            <td>
                                                <p><?= $value['prix'] . ' ' . '€' ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="btn-group">

                                                    <form action="" method="post">
                                                        <input class='btn-mdc' type="submit" name="modifier" value="modifier">
                                                        <input type='hidden' name="modifierQuantite" value='<?= $value['id_produit'] ?>'>

                                                        <input class="btn-mdc"type="submit" value="mettre de coté">

                                                        <button class='btn-mdc' name='supprimer'><i class="fa-solid fa-trash-can" ></i></button>
                                                        <input type="hidden" name='supprimeProduit' value='<?= $value['id_produit'] ?>'>

                                                        <input type="hidden" name='id_nom_taille_kimono' value="<?=$value['id_nom_taille_kimono']?>">
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    </div>
                            <?php

                                $prix = floatval($value['prix']);
                                $sousTotal += $prix;
                                $j++;
                            }?>
                        </tbody>
                    </table>
                    <?php

                        $tva = 13.33;
                        $total = $tva + $sousTotal;

                    ?>
                            <form action="" method="post">
                                <button class="bouton-noir" type="submit" name="vider">Vider le panier</button>
                            </form>
                    </div>
                    <div id="resume">
                        <h2>Résumé</h2>
                        <hr>
                        <table>
                            <tbody>
                                <tr>
                                    <td><p>Sous-total HT</p></td>
                                    <td><p><?= $sousTotal . ' ' . '€' ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>TVA</p></td>
                                    <td><p>13,33 €</p></td>
                                </tr>
                                <tr>
                                    <td><p>Total TTC</p></td>
                                    <td><p><?= $total . ' ' . '€'?></p></td>
                                </tr>
                            </tbody>
                    </table>
                    <button class="bouton-noir" type="submit">Finaliser la commande</button>
                </div>
                <?php
                }
                else {?>
                    <p>Aucun Article dans votre panier</p>
                    <p>Cliquer <span>ici<span> pour continuer vos achat</p>
                    <?php
                }
                ?>
    </section>
    </main>
    <footer>

    </footer>
</body>
</html>