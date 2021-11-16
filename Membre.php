<?php 



    class Membre{
        // Les attributs ----------------------------------------
        private $nom;
        private $prenom;
        private $nationalite;
        private $descript;
        private $linkdin;
        private $twitter;
        private $citation;
        private $photo;

        // Le constructeur ----------------------------------------
        public function __construct($nom,$prenom,$nationalite,$descript,$linkdin,$twitter,$citation,$photo){
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->nationalite = $nationalite;
            $this->descript = $descript;
            $this->linkdin = $linkdin;
            $this->twitter = $twitter;
            $this->citation = $citation;
            $this->photo = $photo;
        }

        // Les accesseurs ---------------------------------------
        public function getNom(){ return $nom; }
        public function getPrenom(){ return $prenom; }
        public function getNationalite(){ return $nationalite; }
        public function getDescript(){ return $descript; }
        public function getLink(){ return $linkdin; }
        public function getTwitter(){ return $twitter; }
        public function getCitation(){ return $citation; }
        public function getPhoto(){ return $photo; }

        public function setNom($nom){ $this->nom = $nom; }
        public function setPrenom($prenom){$this->prenom = $prenom; }
        public function setNationalite($nationalite){ $this->nationalite = $nationalite; }
        public function setDescript($descript){ $this->descript = $descript; }
        public function setLink($linkdin){ $this->linkdin = $linkdin; }
        public function setTwitter($twitter){$this->twitter = $twitter; }
        public function setCitation($citation){ $this->citation = $citation; }
        public function setPhoto($photo){ $this->photo = $photo; }

        // Les methodes ---------------------------------------------
        public function ajouterMembre($connexion){
            $req=$connexion->prepare('INSERT INTO membres (nom, prenom, nationalite, descript, linkdin, twitter, citation, photo) VALUES (:id1, :idz, :id3, :idu, :id5, :id6, :id7, :id8)');
            $req->execute([
                "id1" => $this->nom,
                "idz" => $this->prenom,
                "id3" => $this->nationalite,
                "idu" => $this->descript,
                "id5" => $this->linkdin,
                "id6" => $this->twitter,
                "id7" => $this->citation,
                "id8" => $this->photo
            ]);
        }

        public function suppMembre($connexion,$id){
            $req=$connexion->prepare('DELETE FROM membres WHERE id = :id');
            $req->execute([
                'id' => $id
            ]);
        }

        public static function recupAllMembre($connexion){
            $req=$connexion->query('SELECT * FROM membres');
            $rows=$req->fetchAll();
            return $rows;
        }
    }


?>