<?php
include('../include/commun.php');
include("../modeles/Membre.php");
include("../modeles/Entreprise.php");

function envoyer_mail($expediteur, $destinataire, $sujet, $msg){
	$headers = "From: " . $expediteur . "\r\n" .
"Reply-To: " . $expediteur . "\r\n" .
"X-Mailer: PHP/" . phpversion();
	//echo $msg;
	if ($destinataire != "none@none.fr"){
		mail($destinataire,$sujet,$msg,$headers);
	}else{
		echo "<h2>Boite Mail de " . $destinataire . "</h1><br>";
		echo "<b>From: </b>" . $expediteur . "<br>";
		echo "<b>Sujet: </b>" . $sujet . "<br>";
		echo "<b>Message:</b><br>" . $msg . "<br>";
	}
}

function mail_activation_Membre( $pseudo){
	
	$Ent = getMembreParPseudo();
	if ($Ent != null){
		$ret = $Ent->save();

			
			
		// GENERATION DE LA KEYCODE
		$url = $SITE_BASE . 'controleurs/validation.php?id=' . sha1($GRAINE  . "MEM" . $Ent->getPseudo());
		$msg = 'Cliquez sur le lien pour activer votre compte:  <a href="' . $url .'">' . $url .'</a><br>';	
		envoyer_mail($MAIL_ACTIVATION,$Ent->getEmail(), "Activation de votre compte", $msg );
	}
}
?>
