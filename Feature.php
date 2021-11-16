<?php 



    class Feature{
        // Les attributs ----------------------------------------
        private $titre;
        private $img;
        private $descript;
        private $publication;
        private $contenu;
        private $img_page;
        private $citation;
        private $auteur_id;

        // Le constructeur ----------------------------------------
        public function __construct($titre,$img,$descript,$publication,$contenu,$img_page,$citation,$auteur_id){
            $this->titre = $titre;
            $this->img = $img;
            $this->descript = $descript;
            $this->publication = $publication;
            $this->contenu = $contenu;
            $this->img_page = $img_page;
            $this->citation = $citation;
            $this->auteur_id = $auteur_id;
        }

        // Les accesseurs ---------------------------------------
        public function getTitre(){ return $titre; }
        public function getImg(){ return $img; }
        public function getDescript(){ return $descript; }
        public function getPublication(){ return $publication; }
        public function getContenu(){ return $contenu; }
        public function getImgPage(){ return $img_page; }
        public function getCitation(){ return $citation; }
        public function getAuteur(){ return $auteur_id; }

        public function setTitre($titre){ $this->titre = $titre; }
        public function setImg($img){$this->img = $img; }
        public function setDescript($descript){ $this->descript = $descript; }
        public function setPublication($publication){ $this->publication = $publication; }
        public function setContenu($contenu){ $this->contenu = $contenu; }
        public function setImgPage($img_page){$this->img_page = $img_page; }
        public function setCitation($citation){ $this->citation = $citation; }
        public function setAuteur($auteur_id){ $this->auteur_id = $auteur_id; }

        // Les methodes ---------------------------------------------
        public function ajouterFeature($connexion){
            $req=$connexion->prepare('INSERT INTO features (titre, img, descript, publication, contenu, img_page, citation, auteur_id) VALUES (:id1, :id2, :id3, :id4, :id5, :id6, :id7, :id8)');
            $req->execute([
                "id1" => $this->titre,
                "id2" => $this->img,
                "id3" => $this->descript,
                "id4" => $this->publication,
                "id5" => $this->contenu,
                "id6" => $this->img_page,
                "id7" => $this->citation,
                "id8" => $this->auteur_id
            ]);
        }

        public function suppFeature($connexion,$id){
            $req=$connexion->prepare('DELETE FROM features WHERE id = :id');
            $req->execute([
                'id' => $id
            ]);
        }

        public static function recupAllFeature($connexion){
            $req=$connexion->query('SELECT * FROM features');
            $rows=$req->fetchAll();
            return $rows;
        }
    }


?>