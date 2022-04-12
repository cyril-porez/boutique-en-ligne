<?php
session_start();

var_dump($_SESSION);
if (isset($_POST['deconnexion'])){
    session_destroy();
    header('Location:connexion.php');
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
    <a href="insciption.php">Inscription</a><br>
    <a href="connexion.php">connexion</a>
    <button type="submit" name="deconnexion">deConnexion</button>
</body>
</html>