<?php
	include('../modeles/connect.php');

	class Membre {
		//les attributs:
		private $id;
		private $pseudo;
		private $nom;
		private $prenom;
		private $email;
		private $hashCode;		
		private $age;
		private $sexe;
		private $emailConfirme;
		
		//les methodes:
		public function getPseudo() { //un getter
			return $this->pseudo;
		}

		public function getNom() { //un getter
			return $this->nom;
		}

		public function getPrenom() { //un getter
			return $this->prenom;
		}

		public function getEmail() { //un getter
			return $this->email;
		}

		public function getHashCode() { //un getter
			return $this->hashCode;
		}

		public function getAge() { //un getter
			return $this->age;
		}

		public function getSexe() { //un getter
			return $this->sexe;
		}

		public function getPasswd() { //un getter
			return $this->hashCode;
		}
		
		public function isEmailConfirmed() { //un getter
			if ($this->emailConfirme == 0){
				return true;
			}else{
				return false;	
			}
		}
		//Un constructeur
		public function __construct ($pseudo, $passwd,$email, $nom, $prenom, $age, $sexe,  $emailConfirme ) { 
			$this->pseudo = $pseudo;
			$this->nom = $nom;
			$this->email = $email;
			$this->hashCode = $passwd;
			$this->age = $age;
			$this->sexe = $sexe;
			$this->emailConfirme = $emailConfirme;
			//$this->id = (mysql_query("SELECT MAX(id_membre) FROM likes") or die("Erreur => MAX Objets.construct($id)"))+1;
		}

		/*public function __construct ($pseudo, $passwd,$email,  $emailConfirme, $nom, $prenom, $age, $sexe, $id ) { 
			$this->pseudo = $pseudo;
			$this->nom = $nom;
			$this->email = $email;
			$this->hashCode = $passwd;
			$this->age = $age;
			$this->sexe = $sexe;
			$this->emailConfirme = $emailConfirme;
			$this->id = $id;
		}
*/

		public function save() {
				global $bdd;
				$nouveau_membre = $bdd -> prepare('INSERT INTO membres(pseudo_membre, passwd_membre, email_membre, confirmed_email, nom_membre, prenom_membre, date_naissance_membre, sexe_membre) VALUES (:pseudo_membre, :passwd_membre, :email_membre, :confirmed_email, :nom_membre, :prenom_membre, :date_naissance_membre, :sexe_membre)');
				$nouveau_membre -> execute(array(
								'pseudo_membre' => $this->pseudo, 
								'passwd_membre' => $this->hashCode, 
								'email_membre' => $this->email, 
								'confirmed_email' => $this->emailConfirme, 
								'nom_membre'=> $this->nom, 
								'prenom_membre'=>$this->prenom, 
								'date_naissance_membre'=> $this->age, 
								'sexe_membre'=> $this->sexe
								));
		}

		public static function getMembreParPseudo ($pseudo){
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM membres WHERE pseudo_membre=?');
			$req -> execute(array($pseudo));
			
			if($req->rowCount() == 0) return null;
			$tuple =  $req->fetch();
			
			return new Membre($tuple['pseudo_membre'], $tuple['passwd_membre'], $tuple['email_membre'], $tuple['confirmed_email'], $tuple['nom_membre'], $tuple['prenom_membre'], $tuple['prenom_membre'], $tuple['date_naissance_membre'], $tuple['sexe_membre'], $tuple['id_membre']);
		}	
		
		public static function getMembreParEmail ($email){
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM membres WHERE email_membre=?');
			$req -> execute(array($email));
			
			if($req->rowCount() == 0) return null;
			$tuple =  $req->fetch();
			
			return new Membre($tuple['pseudo_membre'], $tuple['passwd_membre'], $tuple['email_membre'], $tuple['confirmed_email'], $tuple['nom_membre'], $tuple['prenom_membre'], $tuple['prenom_membre'], $tuple['date_naissance_membre'], $tuple['sexe_membre'], $tuple['id_membre']);
		}	
		
		public function setConfirmed() {
			global $bdd;
			$confirm = $bdd -> prepare('UPDATE membres SET confirmed_email = 1 WHERE pseudo_membre =? ');
			$confirm -> execute(array($this->getPseudo()));
		}

		public static function existe ($nom){ //0: ok & 1: pas ok
			global $bdd;
			$ok = true;
			$req = $bdd -> prepare('SELECT * FROM membres WHERE pseudo_membre=?');
			$req -> execute(array($nom)) or $ok == false;

			return $req->rowCount();// >= 1) and $ok; // erreur
		}	
		
	}
?>
