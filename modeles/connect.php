<?php 
	//bdd local sous Wamp
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=ulikebdd','root','');
		$bdd-> exec('SET NAMES utf8'); //On indique le jeu de caractères
	}
	catch (Exception $e)
	{
		die('Erreur : '. $e -> getMessage());
	}
/*
	//BDD Free
	try
	{
		$bdd = new PDO('mysql:host=projet.ulike.sql.free.fr;dbname=projet_ulike','projet.ulike','1rstcircle');
		$bdd-> exec('SET NAMES utf8'); //On indique le jeu de caractères
	}
	catch (Exception $e)
	{
		die('Erreur : '. $e -> getMessage());
	}*/
?>