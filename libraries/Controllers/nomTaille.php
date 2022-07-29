<?php

    namespace Controllers;

    require_once('../autoload.php');

    class nomTaille {

        public function nomTailleGant() {
            $nomGant = new \Models\nomTaille();
            $nom = $nomGant->nomTailleGant();
            return $nom;
        }

        public function nomTailleKimono() {
            $nomKimono = new \Models\nomTaille();
            $nom = $nomKimono->nomTailleKimono();
            return $nom;
        }


        public function nomTailleVet() {
            $nomVet = new \Models\nomTaille();
            $nom = $nomVet->nomTailleVet();
            return $nom;
        }
    }
?>