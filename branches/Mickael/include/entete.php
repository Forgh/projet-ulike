<script type="text/javascript">
window.onload = function(){initAutoComplete(document.getElementById('form-test'),
	document.getElementById('champ-texte'),document.getElementById('bouton-submit'))};


document.onkeydown=keyDownHandler;

_inputField.onkeyup=onKeyUpHandler;

 nouveauDiv.onmousedown=divOnMouseDown;
    nouveauDiv.onmouseover=divOnMouseOver;
    nouveauDiv.onmouseout=divOnMouseOut;
</script>


<header>
	<img id="logo" src="imgs/logos_ulike_small.png" />
<div id="search">
		    <form name="form-test" id="form-test"
		  action="javascript:alert('soumission de ' + document.getElementById('champ-texte').value)"
		  style="margin-left: 50px; margin-top:20px">
		  	<input type="search" id="champ-texte" name="champ-texte" placeholder="Rechercher..." >
            <input type="submit" id="bouton-submit">
        </form>
	</div>
	<div id="connexion">
	
	
		<?php
			if(isset($_SESSION['pseudo']) && isset($_SESSION['passwd'])) {
				echo $_SESSION['pseudo'];
			?>
				: 
				
				<div class="bouton header_out">
					<a href="moncompte.php">Mon Compte</a>
				</div> 
				<div class="bouton header">
					<a href="deconnexion.php">Se Déconnecter</a>
				</div>
		<?php } 
			else {
			?>
				<div class="bouton header">
					<a href="login.php"> Se Connecter </a>
				</div>
				<div class="bouton header">
					<a href="signup.php"> S'enregistrer</a>
				</div>
			<?php
			}
			?>
	</div></div>
</header>