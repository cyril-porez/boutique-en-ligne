<?php
$haystack = 'Gant de boxe rouge';
$needle   = 'Gant';

$pos = strripos($haystack, $needle);

if ($pos === false) {
    echo "Désolé, impossible de trouver ($needle) dans ($haystack)";
} else {
    echo "Félicitations !\n";
    echo "Nous avons trouvé le dernier ($needle) dans ($haystack) à la position ($pos)";
}
?>