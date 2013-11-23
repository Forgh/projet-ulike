<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css">
<title> Insérer le titrer ici </title>


<script type="text/javascript" src="js/jquery-min.js"></script>

</head>
	<body>
	
	<?php
		if(isset($_POST['categorie']) && $_POST['categorie']=="membre"){

			if(isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['sexe'])) {
				include('includes/connect.php');
				$nouveau_membre = $bdd -> prepare('INSERT INTO membres(pseudo_membre, passwd_membre, email_membre, confirmed_email, nom_membre, prenom_membre, age_membre, sexe_membre) VALUES (:pseudo_membre, :passwd_membre, :email_membre, :confirmed_email, :nom_membre, :prenom_membre, :age_membre, :sexe_membre)');
				$nouveau_membre -> execute(array(
											'pseudo_membre' => $_POST['pseudo'], 
											'passwd_membre' => sha1($_POST['passwd']), 
											'email_membre' => $_POST['mail'], 
											'confirmed_email' => 0, 
											'nom_membre'=> $_POST['nom'], 
											'prenom_membre'=> $_POST['prenom'], 
											'age_membre'=> $_POST['age'], 
											'sexe_membre'=> $_POST['sexe']
											));
			}
		}	
		elseif(isset($_POST['categorie']) && $_POST['categorie']=="entreprise") {
			if (isset($_POST['nom_ent']) && isset($_POST['siren']) && isset($_POST['nom_gerant']) && isset($_POST['email_ent']) && isset($_POST['adr_ent']) && isset($_POST['code_ent']) && isset($_POST['pays_ent']) && isset($_POST['code_ent'])) {
				include('includes/connect.php');
				$nouvelle_entreprise = $bdd -> prepare('INSERT INTO entreprises(nom_entreprise, passwd_entreprise, siren_entreprise, nom_gerant, adresse_entreprise, code_postal_entreprise, pays_entreprise, email_entreprise, confirmed_email) VALUES (:nom_entreprise, :passwd_entreprise, :siren_entreprise, :nom_gerant, :adresse_entreprise, :code_postal_entreprise, :pays_entreprise, :email_entreprise, :confirmed_email)');
				$nouvelle_entreprise -> execute(array( 
													'nom_entreprise'=>$_POST['nom_ent'],
													'passwd_entreprise' => sha1($_POST['passwd_ent']),
													'siren_entreprise'=>$_POST['siren'], 
													'nom_gerant'=>$_POST['nom_gerant'], 
													'adresse_entreprise'=>$_POST['adr_ent'], 
													'code_postal_entreprise'=> $_POST['code_ent'], 
													'pays_entreprise'=>$_POST['pays_ent'],
													'email_entreprise'=>$_POST['email_ent'],
													'confirmed_email'=>  0
													));
			}
		}
		
	include('includes/entete.php');		
	?>
	

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
					<form >
						<label>Pseudo:<br>
						<input type="text" name="pseudo"/><br>
						
						Email:<br>
						<input type="email" name="mail"/><br>
						Nom:<br>
						<input type="text" name="nom"/><br>
						Prénom:<br>
						<input type="text" name="prenom"/><br><br>
						Age:<input type="text" name="age" size="2"/>Sexe:<SELECT>
																			<OPTION>M</OPTION>
																			<OPTION>F</OPTION>
																			<OPTION>Autre</OPTION>
																		</SELECT><br><br>
						<div class="bouton bleu" id="user_valider">Valider</div>
						<input type="hidden" name="categorie" value="membre" />

					</form>
				</div>
				
			</div>
			
			
			<div id="infoEntreprise">
				<h2>Informations confidentielles</h2>
				<div class="moitieGauche">
					<form >
						<label for="nom_ent">Nom de l'entreprise:</label>
						<input type="text" name="nom_ent" id="nom_ent" title="hjkjkhjkh"/>

						<label for="siren">N° SIREN:</label>
						<input type="text" name="siren" id="siren"/>

						<label for="nom_gerant">Nom du gérant:</label>
						<input type="text" name="nom_gerant" id="nom_gerant"/>

						<label for="email_ent">Email:</label>
						<input type="email" name="mail_ent" id="email_ent"/>

						<label for="adr_ent">Adresse:</label>
						<input type="text" name="adr_ent" id="adr_ent"/>

						<label for="code_ent">Code postal:</label>
						<input type="text" name="code_ent" id="code_ent"/>

						<label for="pays_ent">Pays:</label>
						<input type="text" name="pays_ent" id="pays_ent"/>
						<input type="hidden" name="categorie" value="entreprise" />
						<div class="bouton bleu" id="user_valider">Valider</div>
					</form>
				</div>
				
			</div>
		</div>
		

		<footer>
			<div id="footer_txt">
				<div id="copyright">hello</div>
			</div>
		</footer>
		
		
		
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
