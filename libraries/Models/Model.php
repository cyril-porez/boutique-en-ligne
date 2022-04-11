<?php

    namespace Models;

    abstract class Model{

        protected $id;
        protected $table = 'categories';
        protected $table_deux = 'sous_categories';
        protected $table_par_id = 'produits';
        protected $table_verif = 'produits';

        public function __construct(){
            $bdd = new \PDO("mysql:host=localhost;dbname=carnage;charset=utf8",'root','');
            $bdd->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
            $this->bdd = $bdd;
            return $bdd;
        }


        public function recuperation_de_donnee(){
            $selection = "SELECT * FROM {$this->table}";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $recuperer_tout = $result->fetchAll();
            return $recuperer_tout;
        }

        public function recuperation_de_donnee2(){
            $selection = "SELECT * FROM {$this->table_deux}";
            $result = $this->bdd->prepare($selection);
            $result->execute();
            $recuperer_tout = $result->fetchAll();
            return $recuperer_tout;
        }

        public function recuperation_par_id($id){
            $selection = "SELECT * FROM {$this->table_par_id} WHERE id = :id";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':id', $id, \PDO::PARAM_INT);
            $result->execute();
            $recuperer_tout = $result->fetchAll();
            return $recuperer_tout;
        }

        public function verif_si_existe_deja($nom){
            $selection = "SELECT nom FROM {$this->table_verif} WHERE nom = :nom";
            $result = $this->bdd->prepare($selection);
            $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
            $result->execute();
            $recupere = $result->fetchAll();
            return $recupere;
        }   
    }
?>