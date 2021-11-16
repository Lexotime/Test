<?php 



    class Projet{
        // Les attributs ----------------------------------
        private $titre;
        private $descript;
        private $img;
        private $contenu_bouton;
        private $lien_bouton;

        // Le constructeur ---------------------------------
        public function __construct($titre,$descript,$img,$contenu_bouton,$lien_bouton){
            $this->titre = $titre;
            $this->descript = $descript;
            $this->img = $img;
            $this->contenu_bouton = $contenu_bouton;
            $this->lien_bouton = $lien_bouton;
        }

        // Les accesseurs -----------------------------------
        public function getTitre(){ return $titre; }
        public function getDescript(){ return $descript; }
        public function getImg(){ return $img; }
        public function getContenu(){ return $contenu_bouton; }
        public function getLien(){ return $lien_bouton; }

        public function setTitre($titre){ $this->titre = $titre; }
        public function setDescript($descript){ $this->descript = $descript; }
        public function setImg($img){ $this->img = $img; }
        public function setContenu($contenu_bouton){ $this->contenu_bouton = $contenu_bouton; }
        public function setLien($lien_bouton){ $this->lien_bouton = $lien_bouton; }

        // Les methodes ---------------------------------------------
        public function ajouterProjet($connexion){
            $req=$connexion->prepare('INSERT INTO projets (titre, descript, img, contenu_bouton, lien_bouton) VALUES (:id1, :id2, :id3, :id4, :id5)');
            $req->execute([
                "id1" => $this->titre,
                "id3" => $this->descript,
                "id2" => $this->img,
                "id4" => $this->contenu_bouton,
                "id5" => $this->lien_bouton
            ]);
        }

        public function suppProjet($connexion,$id){
            $req=$connexion->prepare('DELETE FROM projets WHERE id = :id');
            $req->execute([
                'id' => $id
            ]);
        }

        public static function recupAllProjet($connexion){
            $req=$connexion->query('SELECT * FROM projets');
            $rows=$req->fetchAll();
            return $rows;
        }
    }


?>