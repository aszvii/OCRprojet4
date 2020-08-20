<!DOCTYPE html>

	<html lang="fr">


		<head>

			<meta charset="utf-8" />

			<meta name="viewport" content="width=device-width, initial-scale=1" />

			<meta name="description" content="Blog">

			<link rel="stylesheet" href="public/CSS/style.css">

			<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->

			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />


			<script src="https://cdn.tiny.cloud/1/0al1tvd4e2rul6yt09879uk1sftomgyp2i79g6hches2u177/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script>
    			console.log("hello");
      			tinymce.init({
        			selector: 'textarea#article',
        			language : "fr_FR"
      			});
			</script>



			<title><?= $title ?></title>

		</head>


		<body>

			<header>

				<div id="divFixedMenu">

					<div id="bookTitle">
						<h2><a href="index.php">Billet Simple pour l'Alaska</a></h2>
					</div>


					<div id="headerButton">
						
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

			</header>

			<?= $content ?>


		</body>
		
	</html>
