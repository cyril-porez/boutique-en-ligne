<html>
<?php
    
    require_once('class_Produits.php');
    require_once('modelCategorie.php');
    require_once('modelSousCategorie.php');
    
    $produits = new Produits;
    $categorie = new Categorie;
    $sousCategorie = new SousCategorie;
    //$produits->inserer_produit('Short muay thai carnage destructor', 'car-45698-789', 'Sport', 'qfetsrydtuf', '2', '3', '54.99', 'images/shortmauythaicar1.jpg');

    
    $fetchCategories = $categorie->selection_categorie();
    $fetchSousCategories = $sousCategorie->selection_sous_categorie();
    
    if(!empty($_POST['nom']) && !empty($_POST['reference']) && !empty($_POST['classe']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['sous-categorie']) && !empty($_POST['prix']) && !empty($_POST['image'])){
        $nom = htmlspecialchars($_POST['nom']);
        $reference = htmlspecialchars($_POST['reference']);
        $description = htmlspecialchars($_POST['description']);
        $prix = htmlspecialchars($_POST['prix']);
        $image = htmlspecialchars($_POST['image']);
        
        $produits->inserer_produit($nom, $reference, $_POST["classe"], $description, $_POST['categorie'], $_POST['sous-categorie'], $prix, $image);
    }
    else if(isset($nom, $reference, $_POST["classe"], $description, $_POST["categorie"], $_POST["sous-categorie"], $prix, $image) &&
            empty($nom) && empty($reference) && empty($_POST["classe"]) && empty($description) && empty($_POST["id_utilisateur"]) && empty($_POST["categorie"]) && empty($_POST["sous-categorie"]) && empty($prix) && empty($image)){
                echo 'champ vide';
            }
?>


<main>

<form action="creer_produit.php" method="post">
    <label for="nom">nom</label>
    <input type="text"  name="nom">

    <label for="reference">reference</label>
    <input  name="reference">

    <label for="classe">classe</label>
    <select name="classe">
        <option >Choisissez une option</option>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
        <option value="enfant">Enfant</option>
        <option value="Sport">Sport</option>
    </select>

    <label for="description">description</label>
    <input type="text" name="description">

    <!--<label for="id_utilisateur">id_utilisateur</label>
    <input type="number" name="id_utilisateur">-->

    <select name="categorie">
        <option value="choose" name="choose">Choisir une catégorie d'article</option>
        <?php
            foreach($fetchCategories as $value) {
                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
            }
        ?>
    </select>

    <select name="sous-categorie">
        <option value="choose" name="choose">Choisir une sous-catégorie d'article</option>
        <?php
            foreach($fetchSousCategories as $value) {
                echo "<option value=".$value["id"].">" .$value["nom"]. "</option>";
            }
        ?>
    </select>

    <label for="image">image</label>
    <input type="text" name="image">

    <label for="prix">prix</label>
    <input type="text" name="prix">

    <input type="submit" value="creer">
</form>

</main>
</html>