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

	<form class="formulaire" method="POST" enctype="multipart/form-data" action="controleurs/inscrire_membre.php"  >
		<label for="pseudo">Pseudo:<span class="obligatoire">*</span></label>
		<br>
		<input type="text" name="pseudo" id="pseudo" <?php if (isset($_SESSION['ajout_membre.pseudo']))
																echo ' value="' . $_SESSION['ajout_membre.pseudo'] .'"'; ?>>
																
		<br>

		<label for="passwd">Mot de passe:<span class="obligatoire">*</span></label>
		<br>
		<input type="password" name="passwd" id="passwd">

		
		<br>
		
		<label for="passwd_conf">Mot de passe:<span class="obligatoire">*</span></label>
		<br>
		<input type="password" name="passwd_conf" id="passwd_conf">

		<br>
		
		<label for="mail">Email:<span class="obligatoire">*</span></label>
		<br>
		<input type="email" name="mail" id="mail"<?php if (isset($_SESSION['ajout_membre.mail']))
																echo ' value="' . $_SESSION['ajout_membre.mail'] .'"'; ?>>
		
		<br>
		
		<label for="nom">Nom:</label>
		<br>
		<input type="text" name="nom" id="nom"<?php if (isset($_SESSION['ajout_membre.nom']))
																echo ' value="' . $_SESSION['ajout_membre.nom'] .'"'; ?>>

		<br>
		
		<label for="prenom">Prénom:</label>
		<br>
		<input type="text" name="prenom" id="prenom" <?php if (isset($_SESSION['ajout_membre.prenom']))
																echo ' value="' . $_SESSION['ajout_membre.prenom'] .'"'; ?>>

		<br>
		
		<label for="dateN">Date de naissance:</label>
		<br>
		<input type="text" name="dateN" id="dateN"<?php if (isset($_SESSION['ajout_membre.dateN']))
																echo ' value="' . $_SESSION['ajout_membre.dateN'] .'"'; ?>>

		<br>
		
		<label for="sexe">Sexe:</label>
		<br>
		<SELECT name="sexe">
			<?php 
				$categorie = array('M', 'F', 'Autre');
				$categorie_name = array('sexe_m', 'sexe_f', 'sexe_autre');
				
					for($i = 0; $i<count($categorie);$i++){
						if (isset($_SESSION['ajout_membre.sexe']) and $_SESSION['ajout_membre.sexe'] == $categorie_name[i]){
							echo '<option value="' . $categorie_name[$i] . '" selected >' . $categorie[$i] . '</OPTION>';
						}else{
							echo '<option value="' . $categorie_name[$i] . '">' . $categorie[$i] . '</OPTION>';
						}
					}
			?>
		</SELECT>


		<br>
		<br>
		
		<div class="msgObligatoire">Les champs notés avec un astérique rouge sont obligatoires.</div>

		<br>
		<br>
		<input type="submit" value="Valider">


	</form>
</body>
</html>
