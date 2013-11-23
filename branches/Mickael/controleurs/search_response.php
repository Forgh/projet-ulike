<?php
header('Content-Type: text/xml;charset=utf-8');
echo(utf8_encode("<?xml version='1.0' encoding='UTF-8' ?><options>"));
if (isset($_GET['champ-texte'])) {
    $debut = utf8_decode($_GET['champ-texte']);
} else {
    $debut = "";
}

require('../modeles/connect.php');
$debut = strtolower($debut);

$req = $bdd -> query('SELECT nom_objet FROM objets');
			$stack= array();
			while($ajouter_nom = $req -> fetch()){
				array_push($stack,$ajouter_nom);
			}
							$req->closeCursor();
			
	//		return $stack;
//$liste= Objet::getEveryNames();

//$liste = array([...]);
 
function generateOptions($debut,$liste) {
    $MAX_RETURN = 10;
    $i = 0;
    foreach ($liste as $element) {
        if ($i<$MAX_RETURN && substr($element, 0, strlen($debut))==$debut) {
            echo(utf8_encode("<option>".$element."</option>"));
            $i++;
        }
    }
}
 
generateOptions($debut,$liste);
 
echo("</options>");
?>