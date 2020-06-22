<!DOCTYPE html>

	<html lang="fr">


		<head>

			<meta charset="utf-8" />

			<meta name="viewport" content="width=device-width, initial-scale=1" />

			<meta name="description" content="Blog">

			<link rel="stylesheet" href="public/CSS/style.css">

			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />


			<title><?= $title ?></title>

		</head>


		<body>

			<header>
				<?php 

				if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
				?>
					<p>Bonjour <?= $_SESSION['pseudo'];?> (<a href="index.php?action=disconnect">se déconnecter</a>)</p>
				<?php
				}
				else{
				?>

					<p><a href="index.php?action=connect">Se connecter</a></p>
					<p><a href="index.php?action=register">S'inscrire</a></p>

				<?php
				}
				?>
			</header>

			<?= $content ?>

		</body>
		
	</html>
