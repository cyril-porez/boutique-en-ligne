<?php
require_once('class_Produits.php');
$produits = new Produits;

$fetch3 = $produits->selection_produits();

?>
<html>

<?php
foreach($fetch3 as $value) {?>
    <form action="produit.php" method="get">
        <?php echo $value["nom"];?>
        <button name="produit" value='<?php echo $value['id']; ?>'>Voir le produits</button>
    </form>
<?php }?>
</html>