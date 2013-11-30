<?php session_start(); ?>
<DOCTYPE html>
<html>

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<link rel="stylesheet" href="css/dropbox.css" type="text/css"/>
<script type="text/javascript" src="scripts/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
		<script src="scripts/jquery.qtip.min.js"></script>
		<link rel="stylesheet" href="scripts/jquery.qtip.min.css" />
		<script src="scripts/script_checkobjet.js"></script>
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
</head>
<body>
		<?php include("include/entete.php"); ?>

<div id="bodycentered">
<h2>Formulaire d'ajout d'objet</h2>


 <?php
	/*if (!isset($_SESSION['login_entreprise'])){
		echo "Désolé vous ne pouvez pas ajouter d'objet sans être logué.";
	}
	else {*/
 ?>
 	<div id="ajoutobjet">
		<form method="POST" enctype="multipart/form-data" action="controleurs/post_objet.php"  >
			<p>	
				<label for="nom_objet">Nom de votre objet :</label>	
			</p>
			<p>	
				<input id="nom_objet" type="text"  name="nom_objet">
			</p>
			
			<p>
				<label for="categorie_objet">Catégorie :</label>
			</p>
			<p>	
				<select id="categorie_objet" name="categorie_objet" >
					<?php 
						include('modeles/connect.php');
						$categories=$bdd->query('SELECT nom_categorie FROM categories');
						while ($une_categorie = $categories->fetch())
						{
							echo '<option value="'.$une_categorie['nom_categorie'].'">'.$une_categorie['nom_categorie'].'</option>';
						}
						$categories->closeCursor();
						/*$categorie = array('Vehicule', 'Cheval');
						$categorie_name = array('cat_vehicule', 'cat_cheval');
						
							for($i = 0; $i<count($categorie);$i++){
								if (isset($_SESSION['ajout_objet.categorie_objet']) and $_SESSION['ajout_objet.categorie_objet'] == $categorie_name[i]){
									echo '<option value="' . $categorie_name[$i] . '" selected >' . $categorie[$i] . '</OPTION>';
								}else{
									echo '<option value="' . $categorie_name[$i] . '">' . $categorie[$i] . '</OPTION>';
								}
							}*/
					?>
				</select>
			</p>
			<p>
				<label for="description">Description:</label>
			</p>
			<p>	
				<textarea  id="description" name="description" placeholder="Décrivez votre objet ici"></textarea>
				
			</p> 
		</div> 
		
			<p>
				<div id="dropbox">
		    			<span class="message"> Veuillez glisser-déposer ici l'image de votre objet...</span>
        			</div>
        		</p>
			<p>
				<div class="msgObligatoire">Tout les champs sont obligatoires.</div>
			</p>
			<p>
				<input type="submit" value="Ajouter" >
			</p>
		</form>
		
		<div class="">
				<span class="validateObjet"><?php if(isset($error)) { if ($error) { echo $error['msg']; }} ?></span>
		</div>
</div>
		<?php include("include/footer.php");?>

		<!-- Including The jQuery Library -->
        <script src="scripts/jquery.js"></script>

        <!-- Including the HTML5 Uploader plugin -->
        <script src="scripts/jquery.filedrop.js"></script>
              <!-- The main script file -->
		<script src="scripts/script_dropbox.js"></script>
	<?php 
	//}
	?>	
</body>
</html>
