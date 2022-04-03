<?php 

    require_once('../Controllers/Commentaires.php');

    if (!empty($_POST['commentaire'])) {
        echo 'bob';
        $commentaire = new \Controllers\Commentaires();
        $commentaire->posterCommentaire($_POST['commentaire']);

    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire</title>
</head>
<body>
    <h2>Commentaire:</h2>

    <form action="" method="POST">

        <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
        <input type="submit" value="poster mon commentaire">

    </form>

</body>
</html>