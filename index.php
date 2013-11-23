<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css" />
		<title> ULike </title>
	</head>
	
	<body>
		<?php include("include/entete.php"); ?>
		<div id="bodycentered" >
		<h1>Bienvenue sur ULike !</h1>
			
			
			<p>ULike est un site communautaire de statistiques où chacun peut apporter une critique à des articles. Les membres qui participent au débat recoivent des réductions sur les articles.</p>
			
			
			<h2> Dernier article ajouté </h2>
			
			
			<div>
				<div class="accueilGauche">
					<img src="imgs/objets/vase.png" width="256px" height="256px"></img>
				</div>
			
			
			<div class="accueilDroite">
				<?php include('controleurs/highlight_objet.php');?>
		</div>	
		
		<?php include("include/footer.php");?>
				
	</body>
</html>

