<!DOCTYPE html>

	<html lang="fr">


		<head>

			<meta charset="utf-8" />

			<meta name="viewport" content="width=device-width, initial-scale=1" />

			<meta name="description" content="Blog">

			<link rel="stylesheet" href="public/CSS/style.css">

			<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->

			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />


			<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>



			<title><?= $title ?></title>

		</head>


		<body>

			<header>

				<div id="divFixedMenu">

					<div id="bookTitle">
						<h2><a href="index.php">Billet Simple pour l'Alaska</a></h2>
					</div>

					<div>

					<?php 

					if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
					?>
						<p id="helloMember">Bonjour <em><?= $_SESSION['pseudo'];?></em> (<a id="logOutButton" href="index.php?action=disconnect">se déconnecter</a>)</p>
					<?php

						if($_SESSION['type']==1){
					?>
							<p><a id="adminLinkButton" href="index.php?action=admin">Administration</a></p>
					<?php
						}
					}
					else{
					?>
							<p><a href="index.php?action=connect">Se connecter</a></p>
							<p><a href="index.php?action=register">S'inscrire</a></p>
					<?php
					}
					?>

					</div>

				</div>

				<div id="slider">
					<div id="imgSlider">
						<img src="public/CSS/IMG/imgSlider.png">
					</div>
					<div id="textSlider">
						<h1>Bienvenue sur le blog<br/> de Jean Forteroche</h1>
						<p>Vous souhaitez lire avant tout le monde mon nouveau roman intitulé <em>"Billet Simple pour l'Alaska"</em>.<br/><br/>
							Alors rejoignez dès maintenant mon site où je le publierais par épisode. Et n'hésitez pas à me laisser vos avis en commentaire.
						</p>
					</div>

				</div>
			</header>
			
			<div id="content">
			<?= $content ?>
			</div>

			<footer>
			</footer>

		</body>
		
	</html>
