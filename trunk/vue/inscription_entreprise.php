 <?php session_start(); ?>
<DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>

<h2>Formulaire d'inscription</h2>
<hr>

	<form class="formulaire" method="POST" enctype="multipart/form-data" action="controleurs/inscrire_entreprise.php"  >
		<label for="nom_ent">Nom de l'entreprise:<span class="obligatoire">*</span></label>
		<br>
		<input type="text" name="nom_ent" id="nom_ent" <?php if (isset($_SESSION['ajout_ent.nom_ent']))
																echo ' value="' . $_SESSION['ajout_ent.nom_ent'] .'"'; ?>>
																
		<br>

		<label for="passwd_ent">Mot de passe:<span class="obligatoire">*</span></label>
		<br>
		<input type="password" name="passwd_ent" id="passwd_ent">

		
		<br>
		
		<label for="passwd_ent">Mot de passe:<span class="obligatoire">*</span></label>
		<br>
		<input type="password" name="passwd_ent_conf" id="passwd_ent_conf">

		<br>
		
		<label for="siren">N° SIREN:<span class="obligatoire">*</span></label>
		<br>
		<input type="text" name="siren" id="siren"<?php if (isset($_SESSION['ajout_ent.siren']))
																echo ' value="' . $_SESSION['ajout_ent.siren'] .'"'; ?>>
		
		<br>
		
		<label for="nom_gerant">Nom du gérant<span class="obligatoire">*</span></label>
		<br>
		<input type="text" name="nom_gerant" id="nom_gerant"<?php if (isset($_SESSION['ajout_ent.nom_gerant']))
																echo ' value="' . $_SESSION['ajout_ent.nom_gerant'] .'"'; ?>>

		<br>
		
		<label for="email_ent">Email:<span class="obligatoire">*</span></label>
		<br>
		<input type="email" name="mail_ent" id="mail_ent" <?php if (isset($_SESSION['ajout_ent.mail_ent']))
																echo ' value="' . $_SESSION['ajout_ent.mail_ent'] .'"'; ?>>

		<br>
		
		<label for="adr_ent">Adresse:<span class="obligatoire">*</span></label>
		<br>
		<input type="text" name="adr_ent" id="adr_ent"<?php if (isset($_SESSION['ajout_ent.adr_ent']))
																echo ' value="' . $_SESSION['ajout_ent.adr_ent'] .'"'; ?>>

		<br>
		
		<label for="code_ent">Code postal:<span class="obligatoire">*</span></label>
		<br>
		<input type="text" name="code_ent" id="code_ent"<?php if (isset($_SESSION['ajout_ent.code_ent']))
																echo ' value="' . $_SESSION['ajout_ent.code_ent'] .'"'; ?>>

		<br>
		
		<label for="pays_ent">Pays:<span class="obligatoire">*</span></label>
		<br>
		<input type="text" name="pays_ent" id="pays_ent"<?php if (isset($_SESSION['ajout_ent.pays_ent']))
																echo ' value="' . $_SESSION['ajout_ent.pays_ent'] .'"'; ?>>

		<br>
		<br>
		
		<div class="msgObligatoire">Les champs notés avec un astérique rouge sont obligatoires.</div>

		<br>
		<br>
		<input type="submit" value="Valider">


	</form>
</body>
</html>
