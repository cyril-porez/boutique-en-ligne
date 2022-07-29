<?php
   require_once('../autoload.php');

    session_start();

    $nom = new \Controllers\nomTaille();
    $Gants = $nom->nomTailleGant();
    $kims = $nom->nomTailleKimono();
    $vetements = $nom->nomTailleVet();

    $creerStock = new \Controllers\Stock();
    //$creerStock->creerStockKim();
    $creerStock->creerStockVetement();
    $creerStock->creerStockGant();

    //var_dump($Gants);
    //var_dump($kims);
    //var_dump($vetements);   
?>



    <link rel="stylesheet" href="css/gestion.css">
    <script src="js/script.js" defer></script>
    <?php require_once('header.php'); ?>
    <main>

        <a href="Admin.php"><button>retour</button></a>
       <!-- <button role='button' data-target='#modalCreer' data-toggle='modal' id='connexion-link'>Creer stock vêtements</button>
        <div class="modal" id="modalCreer" role="dialog">
            <div class="modal-content">
                <div class="modal-close" data-dismiss="dialog">X</div>
                    <div class="modal-body">
                        <fieldset>
            
                            <legend>Stock Tailles Vêtements</legend>
            
                            <form action="" method="post">
                
                                <label for="refVet">Référence vêtement:</label>
                                <input type="text" name="refVet" id="refVet">                 
               
                                <select name="idNomVet" id="">
                                    <?php
                                        foreach($vetements as $vetement => $val) {
                                            echo '<option value='. $val['id'] . '>' .$val['nom']. '</option>';
                                        }
                                    ?>
                                </select>                
                                <input type="number" name="quantiteVet" min=0 value='0'>


                                <input type="submit" name="creerVet" value='Envoyer'>
                            </form>
                        </fieldset>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <button role='button' data-target='#modalCreer' data-toggle='modal' id='connexion-link'>Creer stock Kimono</button>
        <div class="modal" id="modalCreer" role="dialog">
            <div class="modal-content">
                <div class="modal-close" data-dismiss="dialog">X</div>
                    <div class="modal-body">
                        <fieldset>
            
                            <legend>Stock Tailles Kimono</legend>
            
                                <form action="" method="post">
                
                                    <label for="refKim">Référence Kimono :</label>
                                        <input type="text" name="refKim">
               
                                            <select name="idNomKim" id="">
                                                <?php
                                                    foreach($kims as $kim => $value) {
                                                        echo '<option value='. $value['id'] . '>' .$value['nom']. '</option>';
                                                    }
                                                ?>
                                            </select>

                                        <input type="number" name="quantiteKim" min=0 value='0'>
                
                                        <input type="submit" name="creerKim" value='Envoyer'>
                                </form> 
                        </fieldset>                        
                    </div>
                </div>
            </div>
        </div>-->
        <button role='button' data-target='#modalCreer' data-toggle='modal' id='connexion-link'>Creer stock Gants</button>
        <div class="modal" id="modalCreer" role="dialog">
            <div class="modal-content">
                <div class="modal-close" data-dismiss="dialog">X</div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <label for="nom">nom</label>
                            <input type="text"  name="nom">

                            <fieldset>            
                                <legend>Stock Tailles Gants</legend>
            
                                <form action="" method="post">
                
                                    <label for="refGant">Référence Gants</label>
                                    <input type="text" name="refGant">

                                    <select name="idNomGant" id="">
                                        <?php
                                            foreach($Gants as $Gant => $valeur) {
                                                echo '<option value='. $valeur['id'] . '>' .$valeur['nom']. '</option>';
                                            }
                                        ?>
                                    </select>

                                    <input type="number" name="quantiteGant" min=0 value='0'>
               
                                    <input type="submit" name="creerGant" value='Envoyer'>
                                </form>
                        </fieldset>
                    </div>
                </div>
            </div>
    </main>
</body>
</html>