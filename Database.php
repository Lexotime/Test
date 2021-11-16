<?php 


    class Database{
        // Les attributs ...............
        private $connexion;

        // Constructeur ..................
        public function __construct(){}

        // Les Methodes ..............................
        public function connecter(){
            $this->connexion = new PDO('mysql:host=localhost;dbname=taikweb', 'root', '');
        }

        // Les Accesseurs ..........................................
        public function getConnexion(){ return $connexion; }
    }


?>