<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modificationDonnee.css">
    <title>Modifier Adresse Livraison</title>
</head>
<body>
    <header>

    </header>
    <main>
    <section id="grand-container">
        <section id="nav">
            <ul>
                <li><a href="profil.php">Mon profil</a></li>
                <li><a href="modifierMotDePasse.php">Modifier changer de mot de passe</a></li>
                <li><a href="modifierAdresseFacturation.php">Modifier l'adresse de facturation</a></li>
                <li><a href="modifierAdresseLivraison.php">Modifier l'adresse de livraison</a></li>
                <li><a href="#">Mes commandes</a></li>
                <li><a href="#">Ma liste d'envies</a></li>
            </ul>
        </section>
        <div id="container">
            <h1>MODIFIER L'ADRESSE</h1>
            <h2>ADRESSE DE <span>LIVRAISON</span></h2>
            <form action="" method="post">
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