<!DOCTYPE html>

	<html lang="fr">


		<head>

			<meta charset="utf-8" />

			<meta name="viewport" content="width=device-width, initial-scale=1" />

			<meta name="description" content="Blog">

			<link rel="stylesheet" href="CSS/style.css">

			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />


			<title>Blog PHP</title>

		</head>



		<body>

			<h1>Mon Super Blog</h1>

			<p>Derniers billets du blog: </p>


			<?php

			try{
				$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
			}
			catch(Exception $e){
				die('Erreur : ' . $e->getMessage());
			}

			$reponse = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0,5');

			echo '<div id="news">';

			while($donnees=$reponse->fetch()){

				 echo   '<h3>'. htmlspecialchars($donnees['titre']). ' le ' .($donnees['date_creation_fr']). '</h3>'.
				 		'<p>'. htmlspecialchars($donnees['contenu']). '</p>'.
			 			'<p><a href="commentaires.php?billet='.$donnees['id'].'">commentaires</a></p>';
				
			}

			echo '</div>';

			$reponse->closeCursor();

			?>

		</body>

	</html>