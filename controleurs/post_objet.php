<?php
				require('modeles/Objet.php');
				
				//On rename le fichier avec un nom hashé en md5 (histoire d'éviter les noms de fichiers foireux ...)
				//Le fichier a été renommé de manière identique lors de son upload en AJAX
				$info = pathinfo($_POST['nom_image']);
				$file_name =  basename($_POST['nom_image'],'.'.$info['extension']);
				$extension_upload = strtolower( strrchr($_POST['nom_image'], '.')  );
				$id_image=md5($file_name);
				$link_thumbnail = "imgs/objets/{$id_image}_thumbnail{$extension_upload}";
				
				$nouvel_objet = new Objet($_POST['nom_objet'], $_SESSION['login_entreprise'],$_POST['categorie_objet'],$_POST['description'],$link_thumbnail);
				$nouvel_objet->save();
				
				header( 'Location: http://projet.ulike.free.fr/post_ajout_objet.php');
?>