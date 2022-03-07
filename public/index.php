

<?php
    require '../vendor/autoload.php';
  
    // Activer altoRouter
    $router = new AltoRouter(); 
    
    // map les routes
    $router->map('GET', '/', 'Accueil', 'Acceuil');
    $router->map('GET', '/contact', 'contact', 'contact');
    $router->map('GET', '/404', '404', '404');

    //match routes

    $match = $router->match();

    if( is_array($match)) {
        if(is_callable( $match['target'])) {
            call_user_func_array( $match['target'], $match['params'] ); 
        } 
        else {
            // no route was matched
            $params = $match['target'];
            //match target avec view
            include "../libraries/Views/{$match['target']}.php";
        }
    }
    else {
        include "../libraries/Views/404.php";

    }

?>