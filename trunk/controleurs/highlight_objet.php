<?php require_once('modeles/Objet.php');
		require_once('modeles/Like.php');
	$carac_objet=Objet::getLastInsertedObjet();
	$nom_objet = $carac_objet->getObjet();
	$number_likes= Like::getNumberOfLikes($nom_objet);
	$number_dislikes = Like::getNumberOfDislikes($nom_objet);
?>
<div class="liste_objet_vote">
	<img src="<?php echo $carac_objet['img_objet']; ?>" alt="<?php echo $carac_objet['nom_objet']; ?>"/>
		<p class="likesNumber"><?php echo $number_likes; ?></p>
		<p class="space"></p>
		<p class="dislikesNumber"><?php echo $number_dislikes; ?></p><img src="css/design/dislike.png"/>
</div>
<p><span class="presentationObjetLbl">Nom:</span><span class="presentationObjetNom"><?php echo $carac_objet['nom_objet']; ?></span></p>
<p><span class="presentationObjetLbl">Categorie:</span><?php echo $carac_objet['categorie_objet']; ?></p>
<p><span class="presentationObjetLbl">Description:</span><?php echo $carac_objet['description_objet']; ?></p>
