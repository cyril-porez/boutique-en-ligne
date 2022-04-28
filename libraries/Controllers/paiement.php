<?php
   

    require_once('../vendor/autoload.php');

       

        // Nous appelons l'autoloader pour avoir accès à Stripe
        $prix = (float)6528;

        // Nous instancions Stripe en indiquant la clé privée, pour prouver que nous sommes bien à l'origine de cette demande
        \Stripe\Stripe::setApiKey('sk_test_51KMXz2L8eUNbBHo6sgsAeEAIaLa7YN4KePAc6VyIzBD6vYPobi6nvhiIZc2i7IwDQ6mY7st3C9SGpQ8EqTeIa8tt00N7j8mWAF');

        // Nous créons l'intention de paiement et stockons la réponse dans la variable $intent
        $intent = \Stripe\PaymentIntent::create([
            'amount' => $prix*100, // Le prix doit être transmis en centimes
            'currency' => 'eur',
        ]);
?>