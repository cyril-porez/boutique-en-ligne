<?php 

    require_once('../Controllers/Commentaires.php');

    if (!empty($_POST['commentaire'])) {
        echo 'bob';
        $commentaire = new \Controllers\Commentaires();
        $commentaire->posterCommentaire($_POST['commentaire']);

    }

    if (!empty($_POST['reponse'])) {
        $reponseCom = new \Controllers\Commentaires();
        $reponseCom->reponseCommentaire();
    }

    $commentaire = new \Controllers\Commentaires();
    $affiches = $commentaire->AfficheCommentaire();
    $affichesReponses = $commentaire->affichReponse();

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

<body>
    <header>

    </header>
    <main>
        <h2>Commentaire:</h2>
    
        <form action="" method="POST">
    
            <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
            <input type="submit" value="poster mon commentaire">
    
        </form><?php

        foreach ($affiches as $affiche) {?>
            <div id="containercomment">
                <div id="entête">
                    <div class="login">
                        <?php echo "<div id ='poster'>Posté le :"." ".date_format(date_create($affiche['date']), 'd/m/Y H:i:s').' '.'</div><div id="par">Posté par :'.' '.$affiche['nom'].'</div>';?>
                    </div>
                    <textarea name="" id="commentaire" cols="30" rows="10" readonly><?php echo $affiche['commentaire']?></textarea>
                    <form action="" method="post">
                        <input type="submit" name="repondre" value="Répondre">
                        <?php
                            if (isset($_POST['repondre'])) {?>
                                <input type="text" name='reponse'>
                                <input type="submit" name='rep' value='Répondre'>
                                <input type="submit" value="Annuler">
                                <?php
                            }
                            foreach ($affichesReponses as $afficheReponse) {
                                if ($afficheReponse['id_commentaire'] == $affiche['id']  ) {?>
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