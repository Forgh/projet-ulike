<?php
	session_start();
	
	include("../modeles/Membre.php");
	
		
		
	if(isset($_POST['pseudo'])){
		$Ent = Membre::getMembreParPseudo($_POST['pseudo']);

		
		if($Ent !=null){ //existe
			$shaOne = sha1($_POST['passwd']);
			//echo $_POST['passwd_ent'], "?<br>", $shaOne, "<br>", $Ent->getPasswd();
			if (strnatcmp($shaOne,$Ent->getPasswd()) == 0 and $Ent->isEmailConfirmed() == true){
				$_SESSION['pseudo_membre'] = $_POST['pseudo'];
				//ok
				echo "ok, vous êtes bien logué";
			}elseif ($Ent->isEmailConfirmed() == false){ 
				//activation
				echo "Vous devez d'abord activez votre compte.";
			}else{
				//Mdp incorrect
				echo "Désolé mais le login ou le mot de passe est incorrect.";
			}
		}else{
			//login incorrect
			echo "Désolé mais le login ou le mot de passe est incorrect.²";
		}
	}else{
		//login manquant
		echo "Veuillez rentrer un pseudo.";
	}

	
	
?>
