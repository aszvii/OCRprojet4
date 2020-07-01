<?php $title= 'Modification d\'un billet'; ?>

<?php ob_start(); ?>

<section id="addModifPostDiv">

	<p><a href="index.php">Retour à l'accueil</a></p>
	<p><a href="index.php?action=admin">Retour à la page d'administration</a></p>

	<div>
		<h1>Modifier un billet</h1>
	</div>

	<form method="post" action="index.php?action=modifyPost&id=<?=$_GET['id']?>">
		<div>
			<label for="title">Titre</label><input type="text" id="title" name="title">
		</div>

		<div>
			<label for="article">Article</label><textarea  cols=50 rows=10 id="article" name="article"></textarea>
		</div>

		<input type="submit" value="Modifier">
	
	</form>

</section>

<?php $content= ob_get_clean(); ?>

<?php require ('view/Backend/template2.php'); ?>