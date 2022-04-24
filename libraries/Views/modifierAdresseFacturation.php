<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modificationDonnee.css">
    <title>Modifier Adresse Facturation</title>
</head>
<body>
    <header>

    </header>
    <main>
    <section id="grand-container">
        <?php require_once('navbarPanelUtilisateur.php') ?>
        <div id="container">

            <h1>MODIFIER L'ADRESSE</h1>
            
            <form action="" method="post">
                <h2>ADRESSE DE <span>FACTURATION</span></h2>

                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" value="">

                <label for="ville">Ville :</label>
                <input type="text" name="ville" value="">

                <label for="codePostal">Code Postal :</label>
                <input type="text" name="codePostal" value="">

                <label for="pays">Pays :</label>
                <input type="text" name="pays" value="">

                <input type="submit" value="Enregistrer l'adresse">
            </form>
        </div>
    </section>
    </main>
    <footer>

    </footer>
</body>
</html>