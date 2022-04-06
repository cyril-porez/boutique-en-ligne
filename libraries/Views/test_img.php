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
        $bdd = mysqli_connect('localhost','root','','test_img');
        mysqli_set_charset($bdd, 'utf8');

        if (isset($_POST['ibra'])){

            $maxsize = 50000;
            $validExt = array('.jpg', '.jpeg', '.png', '.gif');
            $image = $_FILES['uploaded_file'];

            if($image['error'] > 0){
                echo "erreu lors du transfert";
            }

            $filesize = $image['size'];

            if ($filesize > $maxsize){
                echo "fichier trop lourd";
            }
            $filename = $image['name'];
            //  strtolower au cas ou si on a une extension 'PNG'
            $fileExt = '.'.strtolower(substr(strrchr($filename, '.'), 1));

            //  on verifie si notre extension et dans l'array
            if(!in_array($fileExt, $validExt)){
                echo "le fichier n'est pas une image";
            }

            $tmpname = $image['tmp_name'];
            $uniquename = md5(uniqid(rand(), true));
            $filename = "../upload/".$uniquename.$fileExt;
            $resultat = move_uploaded_file($tmpname, $filename);
            if($resultat){
                echo "Uploaded successfully";
            }
            echo $filename;
            mysqli_query($bdd, "INSERT INTO `img`( `image`) VALUES ('$filename')");
        }
    ?>
</body>
</html>