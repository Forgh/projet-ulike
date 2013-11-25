<?php session_start(); ?>
<DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
<h2>Validation d'un compte</h2>
<hr>
<?php 
	if (!isset($_GET["id"])){
		//PAGE erreur
		die("Erreur lien incohérent");
	}
	$param = $_GET["id"];
?>

<form  class="formulaire" method="POST" enctype="multipart/form-data" <?php echo 'action="../controleurs/activation_mail.php?id=' . $param.'"'; ?>  >
	<label for="login_validation">Login:</label>
	<br>
	<input type="text" name="login_validation" >
	
	<br>
	<br>
	
	<input type="submit" value="Activer le compte">
</form>
</body>
</html>
