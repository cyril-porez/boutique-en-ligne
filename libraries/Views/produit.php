<?php
require_once('../Controller/produit.php');
?>
<html>
    <?php echo $fetch4[0]['nom'];
    ?>

    <form action="" method="post">
        <button type="submit" name="jaime">j'aime</button>
        <button type="submit" name="deteste">deteste</button>
</form>
</html>