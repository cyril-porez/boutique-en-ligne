<?php
    require_once('../Models/Categorie.php');

    $id = $_GET['id'];

    $produits = new \Models\Categorie();
    $afficheProduits = $produits->choix_produit_par_categorie($id);
?>

<body>
    <header>

    </header>
    <main>
        <?php
            foreach($afficheProduits as $afficheProduit) {?>
                <img src=<?= $afficheProduit['image1']; ?> alt="image carnage"> <?php
                echo '<br>' . $afficheProduit['nom']. '<br>';
                echo $afficheProduit['prix'] . " €" . '<br>';?>
                <form action="produit.php" method="get">
                    <button name="produit" value=<?= $afficheProduit['id'] ?>>Voir Produit</button>
                </form><?php
            }
        ?>
    </main>
    <footer>

    </footer>
</body>
</html>