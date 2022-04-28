<?php
    require_once('../Controllers/Panier.php');

    session_start();
    setlocale(LC_TIME, 'fr');

    $date = date('Y-m-d a H:i:s');
    $panier = new \Controllers\Panier();
    $contenuPaniers = $panier->contenuPanier();
    var_dump($contenuPaniers);
    $numeroCommande = uniqid();
   
    $total = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/commandes.css">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <?php foreach($contenuPaniers as $cle => $value) :
                $quantite = $value['quantite'];
                $total += $quantite;
            
            ?>
                <div id="grand-container">
                    <div class="commande-container">
                <div class="commande-head">
                    <p>commande effectuer le <?=  $date  ?></p>
                    <p>Livraison :<?= $value['adresse'] . ' ' . $value['code_postal'] . ' ' . $value['ville'] . ' ' . $value['pays'] . ' '  . $value['num_tel']    ?></p>
                    
                    <p>n° de commande:<?= $numeroCommande ?></p>
                </div>
                <div class="commandes">
                    <img src="<?= $value['image1']; ?>" alt="">
                    <h4><?= $value['nom'] ?></h4>
                    <h4>Quantite : <?= $value['quantite'] ?></h4>

                    <p>Prix :  <?= $value['prix'] ?><em> €</em></p>
                    <div>
                        <button type="submit">Voir le produit</button>
                        <button type="submit">Laissez un commentaire sur le produit</button>
                        <button type="submit">ajouter au panier</button>
                    </div>
                </div>
            </div>
        </div>
       
        <?php endforeach ?>
        
        <div>
            <p>Prix Total : <?= $_SESSION['prixTotal'] ?><em> €</em></p>
        </div>
        <?= $total; ?>
    </main>
    <footer>

    </footer>
</body>
</html>