<?php

    namespace Models;

    require_once('Model.php');

    class nomTaille extends Model {

        public function nomTailleGant() {

            $sql = 'SELECT * from  nom_taille_gants';
            $Gant = $this->bdd->prepare($sql);
            $Gant->execute();
            $taille = $Gant->fetchall(\PDO::FETCH_ASSOC);
            return $taille;
        }

        public function nomTailleKimono() {
            $sql = 'SELECT * from nom_taille_kimono';
            $kim = $this->bdd->prepare($sql);
            $kim->execute();
            $taille = $kim->fetchall(\PDO::FETCH_ASSOC);
            return $taille;
        }


        public function nomTailleVet() {
            $sql = 'SELECT * from nom_taille_vetements';
            $vet = $this->bdd->prepare($sql);
            $vet->execute();
            $taille = $vet->fetchall(\PDO::FETCH_ASSOC);
            return $taille;
        }

    }
?>