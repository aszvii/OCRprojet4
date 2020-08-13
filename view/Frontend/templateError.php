<!DOCTYPE html>

	<html id="errorHtml" lang="fr">


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
        			selector: 'textarea#article'
      			});
			</script>



			<title>Erreur</title>

		</head>


		<body id="errorBody">

		<header id="bodyHeader">

			<?php 	if(isset($_SERVER['HTTP_REFERER'])){
			?>
						<p class="returnLink"><a href="<?= $_SERVER['HTTP_REFERER']; ?>">Retour à la page précédente</a></p>
			<?php 
					}
			?>
			<p class="returnLink"><a href="index.php">Retour à l'accueil</a></p>

		</header>	
		
		<div id="errorContent">
			<img src='public/CSS/IMG/errorImg.png'/>

			<p><em><?= 'ERREUR: '?></em><?= $e->getMessage(); ?></p>

		</div>

		</body>
		
	</html>
