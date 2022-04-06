<?php 

    require_once('../Controllers/Commentaires.php');

    $commentaire = new \Controllers\Commentaires();
    $affiches = $commentaire->AfficheCommentaire();

    if (!empty($_POST['commentaire'])) {
        echo 'bob';
        $commentaire = new \Controllers\Commentaires();
        $commentaire->posterCommentaire($_POST['commentaire']);

    }

    

    

    

    //var_dump($affiches);
    //var_dump($affichesReponses);
    /*$temp = '';
    foreach($tableau as $tab){
    if($tab['commentaire'] == $temp)    // suis encore dans le meme commentaire lorsque je veux imprimer les sous commentaire 
    {

    }
    else{

    }
    $temp = $tab['commentaire']
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="commentaire.css">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <h2>Commentaire:</h2>
    
        <form action="" method="POST">
    
            <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
            <input type="submit" value="poster mon commentaire">
    
        </form><?php
        $i = 1;
        foreach ($affiches as $affiche) {?>
            <div id="containercomment">
                <div id="entête">
                    <div class="login">
                        <?php echo "<div id ='poster'>Posté le :"." ".date_format(date_create($affiche['date']), 'd/m/Y H:i:s').' '.'</div><div id="par">Posté par :'.' '.$affiche['nom'].'</div>';?>
                    </div>
                    <textarea name="" id="commentaire" cols="30" rows="10" readonly><?php echo $affiche['commentaire']?></textarea>
                    <form action="" method="post">
                        <!--<input type="submit" name="repondre" value="Répondre">-->
                        <button name="repondre">Répondre</button>
                        <?php
                            $idCom = $affiche['id'];
                            

                            $affichesReponses = $commentaire->affichReponse($idCom);
                            
                            if (!empty($_POST['reponse'])) {
                                var_dump($idCom);
                                echo "blabla";
                                $reponseCom = new \Controllers\Commentaires();
                                $reponseCom->reponseCommentaire($_POST['reponse'], $affiche['id']);
                            }

                            if (isset($_POST['repondre']) && $affiche['id']) {?>
                                <input type="text" name='reponse'>
                                <input type="submit" name='rep' value='Répondre'>
                                <input type="submit" value="Annuler">
                                <?php                                    
                            }

                            
                            foreach ($affichesReponses as $afficheReponse) {
                                if ($afficheReponse['id_commentaire'] == $affiche['id']  ) { ?>
                                    <div id="containercomment">
                                        <div id="entête">
                                            <div class="login">
                                                <?php echo "<div id ='poster'>Posté le :"." ".date_format(date_create($afficheReponse['date']), 'd/m/Y H:i:s').' '.'</div><div id="par">Posté par :'.' '.$afficheReponse['nom'].'</div>';?>
                                            </div>
                                            <textarea name="" id="commentaire" cols="30" rows="10" readonly><?php echo $afficheReponse['reponse']?></textarea>
                                        </div>
                                    </div><?php
                                }
                            }
                        ?>
                    </form>
                </div>
            </div><?php
        }
        ?>
    </main>
    <footer>

    </footer>
</body>
</html>