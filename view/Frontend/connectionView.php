<?php $title= 'Connexion'; ?>

<?php ob_start(); ?>

<div>
	<h1>Saisissez vos identifiants de connexion</h1>
</div>

<form method="post" action="index.php?action=connection">
	<label for="pseudo">Pseudo</label><input type="text" id="pseudo" name="pseudo">
	<label for="password">Mot de passe</label><input type="password" id="password" name="password">
	<input type="submit" value="Se connecter">
</form>

<?php $content= ob_get_clean(); ?>

<?php require ('template.php'); ?>