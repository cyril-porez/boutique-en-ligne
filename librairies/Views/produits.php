<?php
require_once('../Controller/produits.php')
?>
<html>

<?php
if(isset($_GET['sous_categorie']))
{
    $id_sous_categorie = htmlspecialchars($_GET['sous_categorie']);
    $fetch6 = $sous_categorie->recuperation_par_id($id_sous_categorie);
    $fetch5 = $sous_categorie->choix_produit_par_sous_categorie($fetch6[0]['nom']);
    ?>
    <form action="produits.php" action="post">
        <button name='retour' value=''>retour</button>
    </form>
<?php
    if(isset($_POST['retour']))
    {
        header("Refresh:0");
    }
    foreach($fetch5 as $value) {?>
        <form action="produit.php" method="get">
            <?php echo $value["nom"];?>
            <button name="produit" value='<?php echo $value['id']; ?>'>Voir le produits</button>
        </form>
<?php
    }
}
else if(isset($_GET['categorie']))
{
    $id_categorie = htmlspecialchars($_GET['categorie']);
    $fetch8 = $categorie->recuperation_par_id($id_categorie);
    $fetch7 = $categorie->choix_produit_par_categorie($fetch8[0]['nom']);?>
    <form action="produits.php" action="post">
    <button name='retour' value=''>retour</button>
</form>
<?php
    if(isset($_POST['retour'])){
        header("Refresh:0");
    }
    foreach($fetch7 as $value){?>
        <form action="produit.php" method="get">
            <?php echo $value["nom"];?>
            <button name="produit" value='<?php echo $value['id']; ?>'>Voir le produits</button>
        </form>
   <?php
    }
}
else{
    $fetch3 = $produits->selection_produits();
    foreach($fetch3 as $value) {?>
        <form action="produit.php" method="get">
            <?php echo $value["nom"];?>
            <button name="produit" value='<?php echo $value['id']; ?>'>Voir le produits</button>
        </form>
<?php }
}

?>
    <form action="" method="get">
        <select class="connect" name="sous_categorie">
            <option>Choisir une sous-catégorie d'article</option>
            <?php
                foreach($fetch2 as $value) { ?>
                <option value="<?=$value['id']?>"> <?= $value['nom']?></option>;
            <?php }
            ?>
            <input type="submit"  value="executer">
        </select>
    </form>

    <form action="" method="get">
        <select class="connect" name="categorie">
            <option>Choisir une catégorie d'article</option>
            <?php
                foreach($fetch as $value) { ?>
                <option value="<?=$value['id']?>"> <?= $value['nom']?></option>
            <?php }
            ?>
            <input type="submit" value="executer">
            <!-- manque un name o sbumit -->
        </select>
    </form>

</html>