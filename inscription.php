<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css">
		<script type="text/javascript" src="scripts/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
		<script src="scripts/jquery.qtip.min.js"></script>
		<link rel="stylesheet" href="scripts/jquery.qtip.min.css" />
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<script>
		$(document).ready(function()
		{
			$('[title!=""]').qtip(
			{
				position: {
					my:'center left',
					at:'center right',
				},
				style : {
					classes: 'qtip-bootstrap'
				}
				
			});
			
		});
		</script>
		<script src="scripts/script_checkform.js"></script>

<title>Ulike : S'enregistrer</title>


</head>
	<body>
		<header>
			<div id="connexion">
				<div class="bouton petit bleu" id="accueil">Accueil</div>
			</div>	
		</header>

		<div id="bodycentered">
			<div id="categorie">
				<h2>Inscription</h2>
				<div class="msgbox">
					<p>Choisissez votre catégorie</p>
					<div class="msgbox_btn_box">
						<div class="bouton bleu" id="userCas">Utilisateur</div>
						<div class="bouton bleu" id="entrepriseCas">Entreprise</div>
					</div>
				</div>
			</div>
			
			<div id="infoUser">
				<h2>Informations personnelles</h2>
				<div class="moitieGauche">
					<form action="../controleur/inscrire.php" method="post" enctype="multipart/form-data" autocomplete="on">						
						<label for="pseudo">Pseudonyme :<span class="obligatoire">*</span></label>
						<input type="text" name="pseudo" title="Sera affiché sur vos commentaires. <br> Retenez-le, il servira à vous authentifier" class="pseudo">
						
						
						<label for="passwd">Mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" title="Votre mot de passe doit comporter au moins : <br>- 1 majuscule,<br>- 1 minuscule, <br>- 1 chiffre" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="passwd" id="passwd" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Votre mot de passe doit comporter au moins 1 majuscule, 1 minuscule et un chiffre' : ''); if(this.checkValidity()) form.passwordconfirm.pattern = this.value; ">
						<label for="passwdconfirm">Confirmez le mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" title="Doit être identique à celui ci-dessus" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Veuillez entrer un mot de passe identique à celui ci-dessus' : ''); " name="passwdconfirm" class="passwdconfirm">

						<label for="mail">Email :<span class="obligatoire">*</span></label>
						<input type="email" title="Doit être de la forme :<br>nom@domain.zone" name="mail" class="email">
						
						<label for="nom">Nom :</label>
						<input type="text" title="Votre nom ne sera jamais publié<br>ni transmis" name="nom" id="nom">
						
						<label for="prenom">Prénom :</label>
						<input type="text" title="Votre prénom ne sera jamais publié<br>ni transmis" name="prenom" id="prenom">

						
						<label for="age">Age :</label>
						<input type="text"  title="Votre âge ne sera utilisé<br>qu'à des fin statistiques" name="age" id="age">
						
						<label>Sexe:</label>
						<SELECT  title="Cette information ne sera utilisé<br>qu'à des fin statistiques" name="sexe">
							<OPTION>M</OPTION>
							<OPTION>F</OPTION>
							<OPTION>Autre</OPTION>
						</SELECT>
						
						<div class="msgObligatoire">Les champs notés avec un astérique rouge sont obligatoires.</div>
						
						<input type="submit" value="valider">
					</form>
				</div>
				<div class="moitieDroite">
				<p>
					<span class="validateUsername"><?php if(isset($error)) { if ($error) { echo $error['msg']; }} ?></span>
				</p>
				<p>
					<span class="validateEmail"><?php if(isset($error)) { if ($error) { echo $error['msg']; }} ?></span>
				</p>
				</div>
				
				
			</div>
			
			
			<div id="infoEntreprise">
				<h2>Informations confidentielles</h2>
				<div class="moitieGauche">
					<form action="../controleur/inscrire.php" method="post" enctype="multipart/form-data" autocomplete="on">
						<label for="pseudo">Nom de l'entreprise:<span class="obligatoire">*</span></label>
						<input type="text" title="Sera affiché sur la description de vos objets <br> Retenez-le, il servira à vous authentifier" required name="pseudo" class="pseudo">

						<label for="passwd">Mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" title="Votre mot de passe doit comporter au moins : <br>- 1 majuscule,<br>- 1 minuscule, <br>- 1 chiffre" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="passwd" id="passwd" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Votre mot de passe doit comporter au moins 1 majuscule, 1 minuscule et un chiffre' : ''); if(this.checkValidity()) form.passwordconfirm.pattern = this.value; ">
						<label for="passwdconfirm">Confirmez le mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" title="Doit être identique à celui ci-dessus" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Veuillez entrer un mot de passe identique à celui ci-dessus' : ''); " name="passwdconfirm" class="passwdconfirm">

						<label for="mail">Email :<span class="obligatoire">*</span></label>
						<input type="email" title="Doit être de la forme :<br>nom@domain.zone" name="mail_ent" class="email">
						
						<label for="siren">N° SIREN:<span class="obligatoire">*</span></label>
						<input type="text" title="Sert à identifier votre entreprise<br>Cette information ne sera jamais publié" required name="siren" id="siren">

						<label for="nom_gerant">Nom du gérant<span class="obligatoire">*</span></label>
						<input type="text" title="Sert à identifier votre entreprise<br>Cette information ne sera jamais publié" required name="nom_gerant" id="nom_gerant">


						<label for="adr_ent">Adresse:<span class="obligatoire">*</span></label>
						<input type="text" required name="adr_ent" id="adr_ent">

						<label for="code_ent">Code postal:<span class="obligatoire">*</span></label>
						<input type="text" required name="code_ent" id="code_ent">

						<label for="pays_ent">Pays:<span class="obligatoire">*</span></label>
						<input type="text" required name="pays_ent" id="pays_ent">
						
						<div class="msgObligatoire">Les champs notés avec un astérique rouge sont obligatoires.</div>


						<input type="submit" value="valider">
						
						
					</form>
				</div>
				
					<div class="moitieDroite">
				<p>
					<span class="validateUsername"><?php if(isset($error)) { if ($error) { echo $error['msg']; }} ?></span>
				</p>
				<p>
					<span class="validateEmail"><?php if(isset($error)) { if ($error) { echo $error['msg']; }} ?></span>
				</p>
				</div>
				
				
				
			</div>
		</div>
		

				<?php include("include/footer.php");?>

		
		
	</body>
	
	<script type="text/javascript">
		
	
	$('#userCas').click( function() {
		$('#infoUser').slideDown( "slow", function() {
		// Animation complete.
		});
		$('#categorie').slideUp( "slow", function() {
			
		// Animation complete.
		});
		//$('#categorie').hide();
	});
	
	$('#entrepriseCas').click( function() {
		$('#infoEntreprise').slideDown( "slow", function() {
		// Animation complete.
		});
		$('#categorie').slideUp( "slow", function() {
		// Animation complete.
		});
		
		//$('#info').hide();
	});

	$('#accueil').click( function() {
		 $( "#bodycentered" ).fadeOut( "slow", function() {
			// Animation complete.
			document.location.href="accueil.php";
			//???
			$( "#bodycentered" ).fadeIn( "slow", function() {
			});
		});
		
		//$('#categorie').hide();
	});

	window.onload = function() {
		 $( "#bodycentered" ).fadeIn( "slow", function() {
			// Animation complete.
		});
	};
	</script>
</html>
