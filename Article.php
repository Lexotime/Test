<?php 



    class Article{
        // Les attributs ----------------------------------------
        private $titre;
        private $img;
        private $cat_id;
        private $publication;
        private $contenu;
        private $auteur_id;

        // Le constructeur ----------------------------------------
        public function __construct($titre,$img,$cat_id,$publication,$contenu,$auteur_id){
            $this->titre = $titre;
            $this->img = $img;
            $this->cat_id = $cat_id;
            $this->publication = $publication;
            $this->contenu = $contenu;
            $this->auteur_id = $auteur_id;
        }

        // Les accesseurs ---------------------------------------
        public function getTitre(){ return $titre; }
        public function getImg(){ return $img; }
        public function getCatId(){ return $cat_id; }
        public function getPublication(){ return $publication; }
        public function getContenu(){ return $contenu; }
        public function getAuteur(){ return $auteur_id; }

        public function setTitre($titre){ $this->titre = $titre; }
        public function setImg($img){$this->img = $img; }
        public function setCatId($cat_id){ $this->cat_id = $cat_id; }
        public function setPublication($publication){ $this->publication = $publication; }
        public function setContenu($contenu){ $this->contenu = $contenu; }
        public function setAuteur($auteur_id){ $this->auteur_id = $auteur_id; }

        // Les methodes ---------------------------------------------
        public function ajouterArticle($connexion){
            $req=$connexion->prepare('INSERT INTO articles (titre, img, cat_id, publication, contenu,auteur_id) VALUES (:idi, :idz, :id3, :id4, :id5, :id6)');
            $req->execute([
                "idi" => $this->titre,
                "idz" => $this->img,
                "id3" => $this->cat_id,
                "id4" => $this->publication,
                "id5" => $this->contenu,
                "id6" => $this->auteur_id
            ]);
        }

        public function suppArticle($connexion){
            $req=$connexion->prepare('DELETE FROM articles WHERE id = :id');
            $req->execute([
                'id' => $id
            ]);
        }

        public static function recupAllArticle($connexion){
            $req=$connexion->query('SELECT * FROM articles');
            $rows=$req->fetchAll();
            return $rows;
        }
    }


?>
