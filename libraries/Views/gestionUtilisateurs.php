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
    <link rel="stylesheet" href="modal.css">
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
                    <th>Email</th>
                    <th>Date d'inscription</th>
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
                                <div class="box">
                                    <button>Lire</button>
                                    <div class="modal">
                                        <h1>Je suis un Monstre</h1>
                                        <span>ANNULER</span>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <div class="box">
                                    <button>Modifier</button>
                                    <div class="modal">
                                        <h1>Je suis un Monstre</h1>
                                        <span>ANNULER</span>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <div class="box">
                                    <button>supprimer</button>
                                    <div class="modal">
                                        <h1>Je suis un Monstre</h1>
                                        <span>ANNULER</span>
                                    </div>
                                </div>  
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