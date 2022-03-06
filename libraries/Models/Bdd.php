<?php
   
   namespace Models;
   
     class Bdd {
        protected $bdd;
        public function __construct() {
            try {
                $bdd = new \PDO("mysql:host=localhost;dbname=carnage;charset=utf8",'root','');
                $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->bdd = $bdd;
                return $this->bdd;                
            } catch (PDOException $e) {
                echo "connection failed:" . $e->getMessage();
            }
        }
    }
?>