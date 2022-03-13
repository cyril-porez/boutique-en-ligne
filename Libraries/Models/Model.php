<?php

    namespace Models;

    class Model {
        public function __construct() {
            $bdd = new PDO("mysql:host=localhost;dbname=carnage",'root','');
            $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $this->bdd = $bdd;
            return $this->bdd;
        }
    }
?>