<?php
    namespace Controllers;

    function protectionDonnées($données){
        //trim permet de supprimer les espaces inutiles
        $données = trim($données);
        //stripslashes supprimes les antishlashs
        $données = stripslashes($données);
        //htmlspecialchars permet d'échapper certains caractéres spéciaux et les transforment en entité HTML
        $données = htmlspecialchars($données);
        return $données;
    }

    
?>