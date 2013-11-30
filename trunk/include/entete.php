<header>
	<img id="logo" src="entete.jpg" />
	<div id="connexion">
		<?php
			if(isset($_SESSION['pseudo']) && isset($_SESSION['passwd'])) {
				echo $_SESSION['pseudo'];
			?>
				: <a href="moncompte.php">Mon Compte</a> - 
				<a href="deconnexion.php">Se Déconnecter</a>
		<?php } 
			else {
			?>
				<a href="login.php"> Se Connecter </a> / 
				<a href="signup.php"> S'enregistrer</a>
			<?php
			}
			?>
	</div>
</header>