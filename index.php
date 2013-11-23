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
				<div class="liste_objet_vote">
				
						<img src="css/design/like.png"></img>
						<p class="likesNumber">3526</p>
						<p class="space"></p>
						<p class="dislikesNumber">455</p><img src="css/design/dislike.png" ></img>
				</div>
				<p><span class="presentationObjetLbl">Nom:</span><span class="presentationObjetNom">Vase</span></p>
				<p><span class="presentationObjetLbl">Categorie:</span>Mobilier</p>
				<p><span class="presentationObjetLbl">Description:</span>Ce vase en acier inoxydable résiste au temps, aux chocs et aux liquides corrosif. Idéal pour pouvoir y placer des plantes.</p>
			</div>
		</div>	
		
		<?php include("include/footer.php");?>
				
	</body>
</html>

