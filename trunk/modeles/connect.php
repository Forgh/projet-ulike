<?php 
	//bdd local sous Wamp
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=ulikebdd','root','');
		$bdd-> exec('SET NAMES utf8'); //On indique le jeu de caract�res
	}
	catch (Exception $e)
	{
		die('Erreur : '. $e -> getMessage());
	}
?>