<?php
	session_start();

	include("../modeles/Entreprise.php");

		
		
	if(isset($_POST['pseudo'])){
		$Ent = Entreprise::getEntrepriseParNom($_POST['pseudo']);
		
		if($Ent !=null ){ //existe
			$shaOne = sha1($_POST['passwd']);
			//echo $_POST['passwd_ent'], "?<br>", $shaOne, "<br>", $Ent->getPasswd();
			if (strnatcmp($shaOne,$Ent->getPasswd()) == 0 and $Ent->isEmailConfirmed() == true){
				$_SESSION['login_entreprise'] = $_POST['pseudo'];
				//ok
				echo "ok, vous êtes bien logué";
			}elseif ($Ent->isEmailConfirmed() == false){ 
				//activation
				echo "Vous devez d'abord activez votre compte.";
			}else{
				//Mdp incorrect
				echo "Désolé mais le login ou le mot de passe est incorrect.²";
			}
		}else{
			//login incorrect
			echo "Désolé mais le login ou le mot de passe est incorrect.[3]";
		}
	}else{
		//login manquant
		echo "Veuillez rentrer un pseudo.";
	}

	
	
?>
