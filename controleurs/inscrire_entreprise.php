<?php
	session_start();
	
	
	include('../include/commun.php');
	include("../modeles/Entreprise.php");

	$nb = 1;
	if (isset($_POST['pseudo'])){
		$nb = Entreprise::existe($_POST['pseudo']);
	}		
	$ret = true;
	
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
	
	
	$megacondition = ($nb == 0 and empty($_POST['pseudo'])==false  and empty($_POST['passwd'])==false and empty($_POST['passwdconfirm'])==false and $_POST['passwd'] == $_POST['passwdconfirm'] and empty($_POST['nom_gerant'])==false and empty($_POST['mail_ent'])==false and !preg_match($regex, $_POST['mail_ent']) and empty($_POST['adr_ent'])==false and empty($_POST['code_ent'])==false and empty($_POST['pays_ent'])==false and !empty($_POST['siren']));// and (preg_match("(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$",$_POST['passwd_ent'] ));
	
	if ($megacondition){// on verif que l'objet est nouveau
		$Ent = new Entreprise($_POST['pseudo'], sha1($_POST['passwd']), $_POST['siren'], $_POST['nom_gerant'], $_POST['adr_ent'], $_POST['code_ent'], $_POST['pays_ent'], $_POST['mail_ent'],0);
		$ret = $Ent->save();
		
		include("../modeles/mail.php");
		
		$url = $SITE_BASE . 'controleurs/validation.php?id=' . sha1($GRAINE  . "ENT" .  $Ent->getNomGerant());
		$msg = 'Cliquez sur le lien pour activer votre compte:  <a href="' . $url .'">' . $url .'</a>';	
		envoyer_mail($MAIL_ACTIVATION,$Ent->getEmail(), "Activation de votre compte", $msg );
		
		echo "Veuillez utiliser le mail d'activation pour continuer.";
	}
	
	if ($ret == false and $megacondition == false){
		//ici on trouve la raison et on modifie la page d'inscription
		
		foreach($_POST as $key=>$value){
			$_SESSION['ajout_ent.' . $key] = $value;
		} 
		header('Location: '.$SITE_BASE.'inscription.php');
	}
	
	
	
	
?>
