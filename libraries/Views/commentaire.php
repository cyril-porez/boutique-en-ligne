<?php

    require_once('../Controllers/Commentaires.php');

    $commentaire = new \Controllers\Commentaires();
    $affiches = $commentaire->AfficheCommentaire();

    if (!empty($_POST['commentaire'])) {
        $commentaire = new \Controllers\Commentaires();
        $commentaire->posterCommentaire($_POST['commentaire']);
        header("Refresh: 0");
    }
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
            <button id="submit-commentaire" type="submit">poster mon commentaire</button>

        </form><?php

        $j = 0;
        foreach ($affiches as $affiche) {?>
            <div id="containercomment">
                <!-- <div id="entête"> -->
                    <div class="login">
                        <?php echo "<div id ='poster-comment'>Posté le :"." ".date_format(date_create($affiche['date']), 'd/m/Y H:i:s').'<br>'.'Posté par :'.' '.$affiche['nom'].'</div>';?>
                    </div>
                    <div class="reponse">
                        <p><?php echo $affiche['commentaire']?></p>
                    </div>
                    <form id="form-rep" action="" method="post">
                        <input type="hidden" name="idafficherplus" value="<?= $affiche['id']; ?>">
                        <button type="submit" name="afficher_plus<?=$j?>">afficher les réponse</button>
                        <button class="repondre"name="repondre<?=$j?>">Répondre</button>
                    </form>

                        <?php

                $idCom = $affiche['id'];

                            $affichesReponses = $commentaire->affichReponse($idCom);

                            if (!empty($_POST['reponse'])) {
                                $reponseCom = new \Controllers\Commentaires();
                                $reponseCom->reponseCommentaire($_POST['reponse'], $_POST['idReponse']);
                                header("Refresh: 0");
                                break;

                            }

                            if (isset($_POST["repondre".$j])) {?>
                                <form action="" method="post">
                                    <input type="text" name='reponse'>
                                    <button type="submit" name='rep'>envoyer</button>
                                    <input type="hidden" name="idReponse" value="<?= $affiche['id']; ?>">
                                    <button type="submit">Annuler</button>
                                </form>
                                <?php
                            }
                            if(isset($_POST["afficher_plus".$j])){
                                foreach ($affichesReponses as $afficheReponse) {
                                    if ($afficheReponse['id_commentaire'] == $affiche['id']  ) { ?>
                                        <div id="container-reponse">
                                                        <?php echo "<div id ='poster-reponse'>Posté le :"." ".date_format(date_create($afficheReponse['date']), 'd/m/Y H:i:s').'<br>Posté par :'.' '.$afficheReponse['nom'].'</div>';?>
                                                    <div class="reponse">
                                                        <p><?php echo $afficheReponse['reponse']?></p>
                                                    </div>
                                        </div><?php
                                    }
                                }
                            }
                        ?>
            </div><?php
        $j++;
    }
        ?>
    </main>
    <footer>

    </footer>
</body>
</html>