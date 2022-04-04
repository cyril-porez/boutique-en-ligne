<?php 

    require_once('../Controllers/Commentaires.php');

    if (!empty($_POST['commentaire'])) {
        echo 'bob';
        $commentaire = new \Controllers\Commentaires();
        $commentaire->posterCommentaire($_POST['commentaire']);

    }

    $commentaire = new \Controllers\Commentaires();
    $affiches = $commentaire->AfficheCommentaire();

    var_dump($affiches);


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

        foreach($affiches as $affiche) {?>
            <div id="containercomment">
                <div id="entête">
                    <div class="login">
                        <?php echo "<div id ='poster'>Posté le :"." ".date_format(date_create($affiche['date']), 'd/m/Y H:i:s').' '.'</div><div id="par">Posté par :'.' '.$affiche['nom'].'</div>';?>
                    </div>
                    <textarea name="" id="commentaire" cols="30" rows="10" readonly><?php echo $affiche['commentaire']?></textarea>
                </div>
            </div><?php
        }
        ?>
    </main>
    <footer>

    </footer>
</body>
</html>