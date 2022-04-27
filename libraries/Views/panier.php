<?php
    require_once('../Controllers/Panier.php');

    session_start();

    
    //var_dump($idUtilisateur);

    $panier = new \Controllers\Panier();
    $panierUtilisateurs = $panier->panierUtilisateur();
    //var_dump($panierUtilisateurs);
    $sousTotal = 0;
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
        <div class="articles-panier">
            <table>
                <thead>
                    <th class="article">Article</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                </thead>
                <?php
                foreach ($panierUtilisateurs as $panierUtilisateur => $value) {?>
                    <tbody>
                        <tr>                                            
                            <td class="article">
                                <img src="<?= $value['image1'] ?>" alt="">
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
                                    <input class="btn-mdc"type="submit" value="mettre de coté">
                                    <i class="fa-solid fa-trash-can"></i>
                                </div>
                            </td>
                        </tr>         
                    </tbody>               
            </table>
            <hr>           
                <?php
                    $prix = floatval($value['prix']);
                    $sousTotal += $prix;

                    }
                    
                    $tva = 13.33;
                    $total = $tva + $sousTotal;
                    
                ?>
            <button type="submit">Vider le panier</button>
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
            <button type="submit">Finaliser la commande</button>
        </div>
    </section>
    </main>
    <footer>

    </footer>
</body>
</html>