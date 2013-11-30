<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style-ulike.css" />
			   <link rel="stylesheet" href="css/css-drag.css" />
		<script type="text/javascript" src="scripts/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>

		<script>
			$(function() 
			{
				$("#reserve_like").sortable(
				{
					connectWith: '.connectedList',
				    receive: function (event, ui) {
								var element = ui.item.find('input');
								element.attr('name','');
								//change name on element here
							} 
				});
				$("#zonelike").sortable(
				{
					connectWith: '.connectedList',
				    receive: function (event, ui) {
								var element = ui.item.find('input');
								element.attr('name','likes[]');
								//change name on element here
							} 
				});
				$("#zonedislike").sortable(
				{
					connectWith: '.connectedList',
				    receive: function (event, ui) {
								var element = ui.item.find('input');
								element.attr('name','dislikes[]');
								//change name on element here
							} 
				});
			});
		</script>

		<title> ULike - Ajouter une note </title>
	</head>
	
	<body>
		<?php include("include/entete.php"); ?>
		<div id="bodycentered" >
			<form  action="controleurs/post_note.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend> Ajouter votre note : </legend>
			
				<p>
					<ul id="reserve_like" class="connectedList"> 
						<li><input name="" type="hidden" value="Ergonomie"/>Ergonomie</li>
						<li><input name="" type="hidden" value="Design"/>Design</li>
						<li><input name="" type="hidden" value="Ergonomie"/>Qualité/Prix</li>
					</ul>
				</p>
				
				
					<ul id="zonelike" class="connectedList"></ul>
					<ul id="zonedislike" class="connectedList"></ul>
				
				
				<p>
					<label for="commentaire">Commentaire : </label>
					<textarea id="commentaire" name="commentaire" placeholder="Quelque chose à rajouter ? Ajoutez ici votre commentaire !"></textarea>
				</p>
					
				<p>
					<input type="submit" value="Envoyer"/>
				</p>
			</fieldset>
			</form>
		</div>
		
		<?php include("include/footer.php"); ?>
	</body>
</html>