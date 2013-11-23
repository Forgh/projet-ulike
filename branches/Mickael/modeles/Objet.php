<?php
	include('../modeles/connect.php');

	class Objet {
		//les attributs:
		//$bdd;

		private $id;
		private $nom;
		private $proprietaire;
		private $categorie;
		private $description;
		private $img;
		
		//les methodes:
		public function getNom() { //un getter
			return $this->nom;
		}

		public function getProprietaire() { //un getter
			return $this->proprietaire;
		}

		public function getCategorie() { //un getter
			return $this->categorie;
		}
		
		public function getDescription() {
			return $this->description;
		}

		//img?

		//Un constructeur
		public function __construct ($nom, $proprietaire,$categorie,$description,$img) { 
			global $bdd;
			$this->nom = $nom;
			$this->proprietaire = $proprietaire;
			$this->categorie = $categorie;
			$this->description= $description;
			$this->img = $img;
				
		}

	

		public function save() {
				global $bdd;
				$nouveau_membre = $bdd -> prepare('INSERT INTO objets (nom_objet, nom_proprietaire, categorie_objet, description_objet, img_objet) VALUES (:nom_objet, :nom_proprietaire, :categorie_objet, :description_objet, :img_objet)');
				$nouveau_membre -> execute(array(
								'nom_objet' => $this->nom, 
								'nom_proprietaire' => $this->proprietaire, 
								'categorie_objet' => $this->categorie, 
								'description_objet' => $this->description,
								'img_objet' => $this->img
								));
		}

		public static function getObjetParNom ($nom){
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM membres WHERE nom_objet=?');
			$req -> execute(array($nom));
			
			if(mysql_nums_rows()==0) return null;
			$tuple = mysql_fetch_array($req);
			
			return new Objet($tuple['nom_objet'], $tuple['nom_proprietaire'], $tuple['categorie_objet'], $tuple['img_objet']);
		}

		public static function existe ($nom){
			global $bdd;
			$req = $bdd -> prepare('SELECT * AS compte FROM objets WHERE nom_objet=?');
			$req -> execute(array($nom));

			return $req->rowCount();
		}	

		public function rechercheDesObjets ($recherche){
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM objets WHERE nom_objet LIKE :nom_objet OR description_objet LIKE :nom_objet OR nom_proprietaire LIKE :nom_objet');
			$req -> execute(array(
									':nom_objet'=> '%'.$recherche.'%',
									':description_objet'=> '%'.$recherche.'%',
									':nom_proprietaire'=> '%'.$recherche.'%',
									));	
			
			$stack= array();
			while($ajouter_nom = $req -> fetch()){
				array_push($stack,$ajouter_nom);
			}
			
			return $stack;
		}
		
		public function getEveryNames () {
			global $bdd;
			$req = $bdd -> query('SELECT nom_objet FROM objets');
			$stack= array();
			while($ajouter_nom = $req -> fetch()){
				array_push($stack,$ajouter_nom);
			}
			
			return $stack;

		}

		
	}
?>
