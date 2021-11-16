<?php 



    class Auteur{
        // Les attributs ----------------------------------
        private $nom;
        private $prenom;
        private $descript;

        // Constructeur ------------------------------------
        public function __construct($nom,$prenom,$descript){
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->descript = $descript;
        }

        // Les accesseurs -----------------------------------
        public function getNom(){ return $nom; }
        public function getPrenom(){ return $prenom; }
        public function getDescript(){ return $descript; }
        
        public function setNom($nom){ $this->nom = $nom; }
        public function setPrenom($prenom){ $this->prenom = $prenom; }
        public function setDescript($descript){ $this->descript = $descript; }

        // Les methodes ---------------------------------------------
        public function ajouterAuteur($connexion){
            $req=$connexion->prepare('INSERT INTO auteurs (nom, prenom, descript) VALUES (:id1, :id2, :id3)');
            $req->execute([
                "id1" => $this->nom,
                "id2" => $this->prennom,
                "id3" => $this->descript
            ]);
        }

        public function suppAuteur($connexion,$id){
            $req=$connexion->prepare('DELETE FROM auteurs WHERE id = :id');
            $req->execute([
                'id' => $id
            ]);
        }

        public static function recupAllAuteur($connexion){
            $req=$connexion->query('SELECT * FROM auteurs');
            $rows=$req->fetchAll();
            return $rows;
        }
    }


?>