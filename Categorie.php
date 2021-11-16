<?php 



    class Categorie{
        // Les attributs ---------------------------------------------
        private $nom;

        // Le constructeur ------------------------------------------
        public function __construct($nom){
            $this->nom = $nom;
        }

        //Les accesseurs --------------------------------------------
        public function getNom(){ return $nom; }
        
        public function setNom($nom){ $this->nom = $nom; }


        // Les methodes ---------------------------------------------
        public function ajouterCategorie($connexion){
            $req=$connexion->prepare('INSERT INTO categories (nom) VALUES (:names)');
            $req->execute([
                "names" => $this->nom
            ]);
        }

        public function suppCategorie($connexion,$id){
            $req=$connexion->prepare('DELETE FROM categories WHERE id = :id');
            $req->execute([
                'id' => $id
            ]);
        }

        public static function recupAllCategorie($connexion){
            $req=$connexion->query('SELECT * FROM categories');
            $rows=$req->fetchAll();
            return $rows;
        }
    }


?>