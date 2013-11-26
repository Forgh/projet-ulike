<?php
	include('../modeles/connect.php');
	
	class Entreprise {
		private $nom;
		private $passwd;
		private $siren;
		private $nomGerant;
		private $adresse;
		private $code_postal;
		private $pays;
		private $email;
		private $confirmedEmail;
		
		
		public function __construct($nom, $passwd, $siren, $nomGerant, $adresse, $code_postal, $pays, $email, $confirmedEmail){
			$this-> nom = $nom;
			$this-> passwd = $passwd;
			$this-> siren = $siren;
			$this-> nomGerant = $nomGerant;
			$this-> adresse = $adresse;
			$this-> code_postal = $code_postal;
			$this-> pays = $pays;
			$this-> email = $email;
			$this-> confirmedEmail = $confirmedEmail;
			
		}
		
		public function getNom () {
			return $this->nom;
		}
		
		public function getPasswd () {
			return $this->passwd;
		}
		
		public function getSiren () {
			return $this->siren;
		}
		public function getNomGerant () {
			return $this->nomGerant;
		}
		
		public function getAdresse () {
			return $this->adresse;
		}
		
		public function getPays () {
			return $this->pays;
		}
		
		public function getEmail () {
			return $this->email;
		}
		
		/* LES TESTEURS */
		public function isSirenValid() {
			return true;
		}
		
		public function isAddressValid() {
			return true;
		}
		
		public function isEmailConfirmed () {
			if ($this->confirmedEmail == 0){
				return false;
			}else {
				return true;
			}
		}
		
		public function setConfirmed () {
			global $bdd;
			$confirm = $bdd -> prepare('UPDATE entreprises SET confirmed_email = 1 WHERE nom_entreprise = ?');
			$confirm -> execute(array($this->getNom()));
		}
		
		public function save() {
			global $bdd;
			
			if ( empty($this->nom) == false){
				$nouvelle_entreprise = $bdd -> prepare('INSERT INTO entreprises(nom_entreprise, passwd_entreprise, siren_entreprise, nom_gerant, adresse_entreprise, code_postal_entreprise, pays_entreprise, email_entreprise, confirmed_email) VALUES (:nom_entreprise, :passwd_entreprise, :siren_entreprise, :nom_gerant, :adresse_entreprise, :code_postal_entreprise, :pays_entreprise, :email_entreprise, :confirmed_email)');
				$nouvelle_entreprise -> execute(array( 
														'nom_entreprise'=>$this->nom,
														'passwd_entreprise' => $this->passwd,
														'siren_entreprise'=>$this->siren, 
														'nom_gerant'=>$this->nomGerant, 
														'adresse_entreprise'=>$this->adresse, 
														'code_postal_entreprise'=> $this->code_postal, 
														'pays_entreprise'=>$this->pays,
														'email_entreprise'=>$this->email,
														'confirmed_email'=>  $this->confirmedEmail
														)) or die ("Erreur => Entreprise.save()");;
			}else{
				return false; //pour savoir que donnee invalide
			}
		}
		
		public static function getEntrepriseParNom ($nom){
			global $bdd;
			
			$req = $bdd -> prepare('SELECT * FROM entreprises WHERE nom_entreprise= ?');
			$req -> execute(array($nom)) or die("Erreur => Entreprise.getEntrepriseParNom(SQL)");
			
			if($req->rowCount() ==0) return null;
			$tuple = $req->fetch();
			
			
			return new Entreprise($tuple['nom_entreprise'], $tuple['passwd_entreprise'], $tuple['siren_entreprise'], $tuple['nom_gerant'], $tuple['adresse_entreprise'], $tuple['code_postal_entreprise'], $tuple['pays_entreprise'], $tuple['email_entreprise'], $tuple['confirmed_email']);
		}

		public static function getEntrepriseParEmail ($email){
			global $bdd;
			
			$req = $bdd -> prepare('SELECT * FROM entreprises WHERE email_entreprise = ?');
			$req -> execute(array($email)) or die("Erreur => Entreprise.getEntrepriseParEmail(SQL)");
			
			if($req->rowCount() == 0) return null;
			$tuple = $req->fetch();
			
			return new Entreprise($tuple['nom_entreprise'], $tuple['passwd_entreprise'], $tuple['siren_entreprise'], $tuple['nom_gerant'], $tuple['adresse_entreprise'], $tuple['code_postal_entreprise'], $tuple['pays_entreprise'], $tuple['email_entreprise'], $tuple['confirmed_email']);
				
		}

		public static function getEntrepriseParGerant ($nom){
			global $bdd;
			
			$req = $bdd -> prepare('SELECT * FROM entreprises WHERE nom_gerant = ?');
			$req -> execute(array($nom)) or die("Erreur => Entreprise.getEntrepriseParNom(SQL)");
			
			if($req->rowCount() == 0) return null;
			$tuple = $req->fetch();
			
			return new Entreprise($tuple['nom_entreprise'], $tuple['passwd_entreprise'], $tuple['siren_entreprise'], $tuple['nom_gerant'], $tuple['adresse_entreprise'], $tuple['code_postal_entreprise'], $tuple['pays_entreprise'], $tuple['email_entreprise'], $tuple['confirmed_email']);
		}	
	
		public static function existe ($nom){ 
			global $bdd;
			$ok = true;
			$req = $bdd -> prepare('SELECT *  FROM entreprises WHERE nom_entreprise=?');
			$req -> execute(array($nom));
			$ret = $req->fetchAll();

			return (count($ret)!=0); // erreur
		}	

	}
?>