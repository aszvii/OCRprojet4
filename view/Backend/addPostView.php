<?php $title= 'Ajout d\'un billet'; ?>

<?php ob_start(); ?>

<div>
	<h1>Ajouter un billet</h1>
</div>

<form method="post" action="index.php?action=addPosted">
	<div>
		<label for="title">Titre</label><input type="text" id="title" name="title">
	</div>

	<div>
		<label for="article">Article</label><textarea  cols=50 rows=10 id="article" name="article"></textarea>
	</div>

	<input type="submit" value="Publier">
	
</form>

<?php $content= ob_get_clean(); ?>

<?php require ('view/Frontend/template.php'); ?>