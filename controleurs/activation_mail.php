<?php
	include('../include/commun.php');
	include('../modeles/connect.php');

	include("../modeles/Entreprise.php");

	
	$Ent = Entreprise::getEntrepriseParGerant($_POST["login_validation"]);
	if ($Ent != null and isset($_POST["login_validation"]) and isset($_GET["id"])){
		$activation = sha1($GRAINE . "ENT" .  $_POST["login_validation"]);
		if ($_GET["id"] == $activation){
			$Ent->setConfirmed();
			echo "L'activation a réussie.";
		}else{
			//PAGE code invalide (ici le login est inexistant)
			echo "L'activation a échoué: veuillez entrer des informations valide. [ent]";
		}
		
	}else{

		// on suppose qu'il y a tjs moins d'entreprises que de membres
		include("../modeles/Membre.php");
		$Ent = Membre::getMembreParPseudo($_POST["login_validation"]); 
		if ($Ent != null and isset($_POST["login_validation"]) and isset($_GET["id"])){
			$activation = sha1($GRAINE . "MEM" . $_POST["login_validation"]);
			if ($_GET["id"] == $activation){
				$Ent->setConfirmed();
				echo "L'activation a réussie.";
			}else{
				//PAGE code invalide (ici le login est inexistant)
				echo "L'activation a échoué: veuillez entrer des informations valide.";
			}
			
		
		}else{
			//PAGE activation echoue (ici c'est possible que le login soit inexistant)
			echo "L'activation a échoué: veuillez entrer des informations valide.²";
		}
	}
?>
