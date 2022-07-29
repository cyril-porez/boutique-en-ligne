<?php
    
   spl_autoload_register(function($nom_classe) {
    
        /**
         * $className  = nomduNamespace\nomdufichier.php
         * require = ../nomduNamespace/nomdufichier.php
         * str_replace remplace toute les occurence dans une chaîne.
         */
        $className = str_replace("\\", "/", $nom_classe);
        
        require_once("../$nom_classe.php");
    
    }); 

?>