<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css" />
		<title> ULike </title>
		<script>function afficher() {
    $.ajax({
    url: "controleur/show_note.php",
    ifModified:true,
    async: true,
    success: function(content){
 
           $('#otherMarks').html(content);
         }
    });
    setTimeout(afficher, 2000);
}</script>
		
	</head>
	
	<body>
		<?php include("include/entete.php"); ?>
		<div id="bodycentered" >

			<h2>Présentation d'un objet</h2>
			<?php require('controleurs/statistique_objet.php'); ?>
			<div class="moitieDroite">	
				<p><span class="presentationObjetLbl">Nom :</span><?php echo $constructeur_objet;?> - <?php echo $nom_objet; ?></p>
				<p><span class="presentationObjetLbl">Catégorie :</span> <?php echo $categorie_objet; ?></p>
				<p><span class="presentationObjetLbl">Description :</span> <?php echo $description_objet; ?></p>
				<div class="likesNumber">
					<img class="photoObjet" src="css/design/like.png" ></img>
					<p><?php echo $total_like;?></p>
				</div>
				<div class="dislikesNumber">
					<p><?php echo $total_dislike; ?></p><img class="photoObjet" src="css/design/dislike.png" ></img>
				</div>
			</div>
			<div class="moitieGauche border">	
				<img class="photoObjet" src="<?php echo $img_objet; ?>" alt="<?php echo $nom_objet; ?>" width='256' height='256'></img>
			</div>
			<div id="zoneenregistre">
	<ul id="zonelike">
		<?php 
			if($total_ergonomie>0){
				?><li><img src="imgs/ergo.png" alt="On aime : l'ergonomie"/></li><?php
			}
			if($total_design>0){
				?><li><img src="imgs/design.png" alt="On aime : le design"/></li><?php
			}
			if($total_qualite>0){
				?><li><img src="imgs/qualite-prix.png" alt="On aime : le rapport qualité/prix"/></li><?php
			}
		?>
	</ul>
	<ul id="zonedislike">
		<?php 
			if($total_ergonomie<0){
				?><li><img src="imgs/ergo.png" alt="On n'aime pas : l'ergonomie"/></li><?php
			}
			if($total_design<0){
				?><li><img src="imgs/design.png" alt="On n'aime pas : le design"/></li><?php
			}
			if($total_qualite<0){
				?><li><img src="imgs/qualite-prix.png" alt="On n'aime : pas le rapport qualité/prix"/></li><?php
			}
		?>
	</ul>
</div>
			<p>			
			<form method="post" enctype="multipart/form-data" onsubmit="afficher()">						
				<input type="submit" value="En voir [+]...">
			</form>
</p>
<div id="otherMarks"></div>
		</div>
		
		<?php include("include/footer.php");?>
				
	</body>
</html>

