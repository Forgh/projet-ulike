<?php
	include('../modeles/connect.php');

	class Note {
		//les attributs:
		private $pseudo;
		private $commentaire;
		private $objet;
		
		//les methodes:
		public function getPseudo() { //un getter
			return $this->pseudo;
		}

		public function getCommentaire() { //un getter
			return $this->commentaire;
		}
		
		public function getObjet(){
			return $this->objet;
		}
		
		public function getId(){
			global $bdd;
			$idmax=$bdd->query("SELECT MAX(id_note) FROM notes") or die("Erreur => MAX Note.construct($id)");
			$result = $idmax -> fetch();
			$ret = $result[0];
			return $ret;
		}

		public function __construct ($pseudo, $commentaire, $objet) {
				 
			$this->pseudo = $pseudo;
			$this->commentaire = $commentaire;
			$this->objet = $objet;
		}

		public function save() {
				global $bdd;
				$nouveau_membre = $bdd -> prepare('INSERT INTO notes(commentaire, pseudo_auteur) VALUES (:commentaire, :pseudo_auteur)');
				$nouveau_membre -> execute(array(
								'commentaire' => $this->commentaire, 
								'pseudo_auteur' => $this->pseudo, 
								))or die ("Erreur => Note.save()");
				
		}
		

	}

?>
