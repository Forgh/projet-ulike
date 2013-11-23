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

			<h2>Présentation d'un objet</h2>
			<div class="moitieDroite">	
				<p><span class="presentationObjetLbl">Nom :</span> machin</p>
				<p><span class="presentationObjetLbl">Catégorie :</span> papeterie</p>
				<p><span class="presentationObjetLbl">Description :</span> description</p>
				<div class="likesNumber">
					<img class="photoObjet" src="css/design/like.png" ></img>
					<p>1231531530</p>
				</div>
				<div class="dislikesNumber">
					<p>9012015</p><img class="photoObjet" src="css/design/dislike.png" ></img>
				</div>
			</div>
			<div class="moitieGauche border">	
				<img class="photoObjet" src="imgs/objets/art.png" width='256' height='256'></img>
			</div>
			<p>			<a href="ajout_objet.php" >En voir plus... [+]</a>
</p>
		</div>
		
		<?php include("include/footer.php");?>
				
	</body>
</html>

