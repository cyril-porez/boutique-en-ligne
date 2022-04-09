<?php

    require_once('../Controllers/Admin.php');

    $utilsateurs = new \Controllers\Admin();
    $afficheUtilisateurs = $utilsateurs->selectionneUtilisateurs();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestionUtilisateurs.css">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        
               

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>article</th>
                    <th>nom</th>
                    <th>date</th>
                    <th>login</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($afficheUtilisateurs as $afficheUtilisateur){ ?>
                        <tr>
                            <td><?= $afficheUtilisateur['id']; ?></td>
                            <td><?= $afficheUtilisateur['nom']; ?></td>
                            <td><?= $afficheUtilisateur['prenom']; ?></td>
                            <td><?= $afficheUtilisateur['email']; ?></td>
                            <td><?= $afficheUtilisateur['date']; ?></td>
                            <td>
                                <form action="updateArticle.php" method="get">
                                    <button type="submit" name="updateArticle" value=<?= $afficheUtilisateur['id']; ?>>Modifier</button>
                                </form>                        
                            </td>
                            <td>
                                <form action="updateArticle.php" method="get">
                                    <button type="submit" name="updateArticle" value=<?= $afficheUtilisateur['id']; ?>>Modifier</button>
                                </form>
                            </td>
                            <td>
                                <form action="updateArticle.php" method="get">
                                    <button type="submit" name="updateArticle" value=<?= $afficheUtilisateur['id']; ?>>Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </main>
    <footer>

    </footer>    
</body>
</html>