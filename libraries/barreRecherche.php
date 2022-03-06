<?php

    $bdd = new PDO("mysql:host=localhost;dbname=carnage;charset=utf8",'root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $produits = $bdd->prepare("SELECT nom from produits order by id desc");
    
    if (isset($_GET['recherche'])) {
        $recherche = $_GET['recherche'];
        $produits = $bdd->prepare('SELECT nom, prix, image1 from produits where nom like "%'.$recherche.'%" order by id desc');
        $produits->execute();
        $produit = $produits->fetchall(PDO::FETCH_ASSOC);
        var_dump($produit);
        
        foreach($produit as $value) {
            
            echo $value['nom']. '<br>';
            echo $value['prix'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>barre de recherche</title>
</head>
<body>
    <main>
        <form action="" method="get">
            <input type="search" name="recherche" placeholder="rechercher article">
            <input type="submit" value="rechercher">
        </form>
        <img src="images/carnage1.jpg" alt=""> 
    </main>
</body>
</html>