<!DOCTYPE html>

	<html lang="fr">


		<head>

			<meta charset="utf-8" />

			<meta name="viewport" content="width=device-width, initial-scale=1" />

			<meta name="description" content="Commentaires">

			<link rel="stylesheet" href="CSS/style.css">

			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />


			<title>Commentaires PHP</title>

		</head>



		<body>

			<p><a href="blog.php">Retour à la liste des billets</a></p>

			<h1>Mon Super Blog</h1>


			<?php

			try{
				$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
			}
			catch(Exception $e){
				die('Erreur : ' . $e->getMessage());
			}

			$reponse=$bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
			$reponse->execute(array($_GET['billet']));
			$donnees=$reponse->fetch();

			//si l'id du billet demandé existe, on affiche la page
			if(!empty($donnees))
			{

			echo 	'<div id="news">'.
			   		'<h3>'. htmlspecialchars($donnees['titre']). ' le ' .($donnees['date_creation_fr']). '</h3>
				 	<p>'. htmlspecialchars($donnees['contenu']). '</p>'.
				 	'</div>';


			echo '<h2>Commentaires</h2>';

			
			$reponse->closeCursor();

			

			$reponse=$bdd->prepare('SELECT id, id_billet, auteur, commentaire,  DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet=? ORDER BY date_commentaire');

			$reponse->execute(array($_GET['billet']));

			echo '<div id="comments">';

			while($donnees=$reponse->fetch()){

					echo '<p><strong>'.htmlspecialchars($donnees['auteur']) .'</strong>'. ' le '. $donnees['date_commentaire_fr'].'</p>'.
					'<p class="commentsContents">'.htmlspecialchars(($donnees["commentaire"])).'</p>';
						
			}

			echo '</div>';


			$reponse->closeCursor();




			echo '<form method="post" action="commentaires_post.php?billet='.$_GET['billet'].'">

				<p id="title">Ajouter un commentaire</p>

				<p>
					<label for="pseudo">pseudo</label><input type="text" name="pseudo" id="pseudo" /><br/>
					<textarea name="message" id="message" rows="10" cols="50">tapez votre commentaire</textarea><br/>
					<input type="submit" name="envoyer" />
				</p>';
			}

			//sinon on alerte le visiteur d'une erreur
			else{
				echo 'IMPOSSIBLE D\'AFFICHER LA PAGE DEMANDEE';
			}
		

			
			?>

		</body>

	</html>