<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype = "multipart/form-data">
        <input type="file" name="uploaded_file">

        <input type="submit" name="ibra" value="caca">
    </form>

    <?php

        if (isset($_POST['ibra'])){

            $maxsize = 50000;
            // $validExt = array('.jpg', '.jpeg', '.png', '.gif');

            if($_FILES['uploaded_file']['error'] > 0){
                echo "erreu lors du transfert";
                die;
            }

            $filesize = $_FILES['uploaded_file']['size'];

            if ($filesize > $maxsize){
                echo "fichier trop lourd";
                die;
            }
            $filename = $_FILES['uploaded_file']['name'];
            //  strtolower au cas ou si on a une extension 'PNG'
            $fileExt = '.'.strtolower(substr(strrchr($filename, '.'), 1));

            //  on verifie si notre extension et dans l'array
            // if(in_array($fileExt, $validExt)){
            //     echo "le fichier n'est pas une image";
            //     die;
            // }

            $tmpname = $_FILES['uploaded_file']['tmp_name'];
            $uniquename = md5(uniqid(rand(), true));
            $filename = "./upload".$uniquename.$fileExt;
            $resultat = move_uploaded_file($tmpname, $filename);
            if($resultat){
                echo "Uploaded successfully";
            }
        }
    ?>
</body>
</html>