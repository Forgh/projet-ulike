<?php
	include('modeles/connect.php');
	
	class Like {
		private $contenu;
		private $origine;
		private $type;
		
		
		public function __construct($contenu, $origine, $type){
			$this-> contenu = $contenu;
			$this-> origine = $origine;
			$this-> type = $type;
		}
		
		public function getContenu() {
			return $this-> contenu;
		}
		
		public function getOrigine() {
			return $this-> origine;
		}
		
		public function getType() {
			return $this-> type;
		}
		
		public function save() {
			global $bdd;
			$nouveau_like = $bdd -> prepare('INSERT INTO likes (contenu_like, origine_like, type_like) VALUES (:contenu_like, :origine_like, :type_like)');
			$nouveau_like-> execute(array( 
											'contenu_like' => $this->contenu,
											'origine_like' => $this->origine,
											'type_like'=> $this->type,
											))or die ("Erreur => Like.save()");
			
		}
		
		public static function getLikeById ($id){
			global $bdd;

			$req = $bdd -> prepare('SELECT * FROM likes WHERE id= ?');
			$req -> execute(array($id));
			
			if($req->rowCount()==0) return null;
			$tuple = $req->fetch();
			
			return new Like($tuple['contenu_like'],$tuple['origine_like'],$tuple['type_like'],$tuple['id_like']);
		}	



		public function getNumberOfLikes($nom){
			global $bdd;
			
			$req= $bdd->prepare('SELECT id_note FROM notes WHERE nom_objet_source=?');
			$req-> execute(array($nom));
			
			$number_likes=0;
			if($req->rowCount()!=0){
				while($nom_note = $req->fetch()){
					$req2 = $bdd->prepare('SELECT SUM(type_like) FROM likes WHERE origine_like = ? AND type_like=1');
					$req2 -> execute(array($nom_note));
					$number_likes+=$req2->fetchColumn();
				}
			}
			return $number_likes;
		}

		public function getNumberOfDislikes($nom){
			global $bdd;

			$req= $bdd->prepare('SELECT id_note FROM notes WHERE nom_objet_source=?');
			$req-> execute(array($nom));
			
			$number_likes=0;
			if($req->rowCount()!=0){
				while($nom_note = $req->fetch()){
					$req2 = $bdd->prepare('SELECT COUNT(id_like) FROM likes WHERE origine_like = ? AND type_like=0');
					$req2 -> execute(array($nom_note));
					$number_likes+=$req2->fetchColumn();
				}
			}
			return $number_likes;
		}

	}
	
?>