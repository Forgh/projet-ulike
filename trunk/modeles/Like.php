<?php
	include('../modeles/connect.php');
	
	class Like {
		private $contenu;
		private $origine;
		private $type;
		
		
		public function __construct($contenu, $origine, $type){
			$this-> contenu = $contenu;
			$this-> origine = $origine;
			$this-> type = $type;
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
			
			if(mysql_nums_rows()==0) return null;
			$tuple = mysql_fetch_array($req);
			
			return new Like($tuple['contenu_like'],$tuple['origine_like'],$tuple['type_like'],$tuple['id_like']);
		}	


	}
	
?>