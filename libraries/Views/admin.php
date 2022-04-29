<?php
session_start();
if(!empty($_SESSION['utilisateurs']) && $_SESSION['utilisateurs'][0]['id_droits'] == 2){
    header('Location: index.php');
}
?>

<?php require_once('header.php'); ?>
    <main>
        <section id="admin">
            <img src="images/admin.png" alt="">
            <div class="container">
                    <a href="gestionUtilisateurs.php">
                        <img class="icon" src="images/utilisateurs.png" alt="" class="icone">
                        Gestion des Utilisateurs
                    </a>

                    <a href="gestionCategories.php">
                        <img class="icon" src="images/categorie.png" alt="" class="icone">
                        Gestion de Catégories
                    </a>
            </div>
            <div class="container">
                    <a href="gestionProduits.php">
                        <img class="icon" src="images/produits.png" alt="" class="icone">
                        Gestion des Produits
                    </a>

                    <a href="gestionCommentaires.php">
                        <img class="icon" src="images/commentaires.png" alt="" class="icone">
                        Gestion des Commentaires
                    </a>
            </div>
        </section>
    </main>
    <?php require_once('footer.php'); ?>