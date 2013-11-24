<?php
	require_once('modeles/Objet.php');
	
	$categories = Objet::seekAllCategories();
	
    while ($une_categorie = $categories->fetch())
	{
		echo '<option value="'.$une_categorie['nom_categorie'].'">'.$une_categorie['nom_categorie'].'</option>';
	}
	
	$categories->closeCursor();
?>