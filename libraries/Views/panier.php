<?php
    require_once('../Controllers/Panier.php');
    require_once('../Controllers/Utilisateurs.php');

    session_start();

    $idUtilisateur = $_SESSION['utilisateurs'][0]['id'];
    $panier = new \Controllers\Panier();
    $supprimerPanier = new \Controllers\Utilisateurs();
    $utilisateurPanier = new \Controllers\Utilisateurs();

    if (isset($_POST['supprimer'])) {
        $utilisateurPanier->supprimerProduitPanier($idUtilisateur, $_POST['supprimeProduit'], $_POST['id_nom_taille_kimono']);
    }

    if (isset($_POST['modifier'])) {
        $utilisateurPanier->modifierQuantitePanier($idUtilisateur, $_POST['modifierIdProduit'], $_POST['modifQuantite'], $_POST['id_nom_taille_kimono']);
    }

    if (isset($_POST['finaliser'])) {

        header('Location: commandes.php');

    }

    $panierUtilisateurs = $panier->panierUtilisateur();
    // var_dump($panierUtilisateurs);

    $sousTotal = 0;
    $supprimerPanier->supprimePanierUtilisateur();


?>


<?php require_once('header.php'); ?>
<main>
    <section id="panier">
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
                        $_SESSION['prixTotal'] = $total;

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
                    <form action="paiement.php" method="post">
                        <button name='finaliser' class="bouton-noir" type="submit">Finaliser la commande</button>                       
                    </form>
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
    <?php require_once('footer.php'); ?>