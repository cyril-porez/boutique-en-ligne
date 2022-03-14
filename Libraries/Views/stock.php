<?php
    require_once('../Controllers/stock.php');

    

    if (!empty($_POST['tailleA0']) && !empty($_POST['tailleA1']) && !empty($_POST['tailleA2'])  && !empty($_POST['tailleA3']) 
    && !empty($_POST['tailleA4'])  && !empty($_POST['tailleA5']) && !empty($_POST['tailleC0']) && !empty($_POST['tailleC00']) 
    && !empty($_POST['tailleC1']) && !empty($_POST['tailleC2']) && !empty($_POST['tailleC3']) && !empty($_POST['tailleC4'])
    && !empty($_POST['refKim'])) {
        
        $a0 = $_POST['tailleA0'];
        $a1 = $_POST['tailleA1'];
        $a2 = $_POST['tailleA2'];
        $a3 = $_POST['tailleA3'];
        $a4 = $_POST['tailleA4'];
        $a5 = $_POST['tailleA5'];
        $c0 = $_POST['tailleC0'];
        $c00 = $_POST['tailleC00'];
        $c1 = $_POST['tailleC1'];
        $c2 = $_POST['tailleC2'];
        $c3 = $_POST['tailleC3'];
        $c4 = $_POST['tailleC4'];
        $referenceProduit = $_POST['refKim'];
        
        $crerStokim = new \Controllers\stock;
        $crerStokim->creerStockKim($a0, $a1, $a2, $a3, $a4, $a5, $c0, $c00, $c1, $c2, $c3, $c4, $referenceProduit);
    }

    if (!empty($_POST['tailleS']) && !empty($_POST['tailleM']) && !empty($_POST['tailleL'])  && !empty($_POST['tailleXL']) &&
    !empty($_POST['tailleXXL']) && !empty($_POST['refVet'])) {
        $s = $_POST['tailleS'];
        $m = $_POST['tailleM'];
        $l = $_POST['tailleL'];
        $xl = $_POST['tailleXL'];
        $xll = $_POST['tailleXXL'];
        $referenceProduit = $_POST['refVet'];

        $crerStokim = new \Controllers\stock;
        $crerStokim->creerStockVetement($s, $m, $l, $xl, $xll, $referenceProduit);
    }

    if (!empty($_POST['taille10oz']) && !empty($_POST['taille12oz']) && !empty($_POST['taille14oz'])  && !empty($_POST['taille16oz']) &&
    !empty($_POST['refGant'])) {
        $dixOz = $_POST['taille10oz'];
        $douzeOz = $_POST['taille12oz'];
        $quatorzeOz = $_POST['taille14oz'];
        $seizeOz = $_POST['taille16oz'];
        $referenceProduit = $_POST['refGant'];

        $crerStokim = new \Controllers\stock;
        $crerStokim->creerStockGant($dixOz, $douzeOz, $quatorzeOz, $seizeOz, $referenceProduit);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <fieldset>
            
            <legend>Stock Tailles Vêtements</legend>
            
            <form action="" method="post">
                
                <label for="refVet">Référence vêtement</label>
                <input type="text" name="refVet">

                <label for="tailleS">TailleS</label>
                <input type="text" name="tailleS">

                <label for="tailleM">TailleM</label>
                <input type="text" name="tailleM">

                <label for="tailleL">Taille L</label>
                <input type="text" name="tailleL">

                <label for="tailleXL">Taille XL</label>
                <input type="text" name="tailleXL">

                <label for="tailleXXL">Taille XXL</label>
                <input type="text" name="tailleXXL">

                <input type="submit">
            </form>
        </fieldset>

        <fieldset>
            
           <legend>Stock Tailles Kimono</legend>
            
            <form action="" method="post">
                
                <label for="refKim">Référence vêtement</label>
                <input type="text" name="refKim">

                <label for="tailleA0">taille AO</label>
                <input type="text" name="tailleA0">

                <label for="tailleA1">taille A1</label>
                <input type="text" name="tailleA1">

                <label for="tailleA2">taille A2</label>
                <input type="text" name="tailleA2">


                <label for="tailleA3">taille A3</label>
                <input type="text" name="tailleA3">

                <label for="tailleA4">taille A4</label>
                <input type="text" name="tailleA4">

                <label for="tailleA5">taille A5</label>
                <input type="text" name="tailleA5">

                <label for="tailleC0">taille C0</label>
                <input type="text" name="tailleC0">

                <label for="tailleC00">taille C00</label>
                <input type="text" name="tailleC00">

                <label for="tailleC1">taille C1</label>
                <input type="text" name="tailleC1">

                <label for="tailleC2">taille C2</label>
                <input type="text" name="tailleC2">

                <label for="tailleC3">taille C3</label>
                <input type="text" name="tailleC3">

                <label for="tailleC4">taille C4</label>
                <input type="text" name="tailleC4">


                <input type="submit" name="creeKim">
            </form>
            <?php
                $error = new \Controllers\stock();
                $error->creerStockKim(isset($_POST['tailleA0']), isset($_POST['tailleA1']), isset($_POST['tailleA2']), isset($_POST['tailleA3']), isset($_POST['tailleA4']), isset($_POST['tailleA5']), isset($_POST['tailleC0']), isset($_POST['tailleC00']), isset($_POST['tailleC1']), isset($_POST['tailleC2']), isset($_POST['tailleC3']), isset($_POST['tailleC4']), isset($_POST['refKim']));
            ?> 
        </fieldset>

        <fieldset>
            
            <legend>Stock Tailles Gants</legend>
            
            <form action="" method="post">
                
                <label for="refVet">Référence vêtement</label>
                <input type="text" name="refGant">

                <label for="taille10oz">Taille 10oz</label>
                <input type="text" name="taille10oz">

                <label for="taille12oz">Taille 12oz</label>
                <input type="text" name="taille12oz">

                <label for="taille14oz">Taille 14oz</label>
                <input type="text" name="taille14oz">

                <label for="taille16oz">Taille 16oz</label>
                <input type="text" name="taille16oz">

                <input type="submit">
            </form>
        </fieldset>
    </main>
</body>
</html>