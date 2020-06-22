<?php $title= 'S\'inscrire'; ?>

<?php ob_start(); ?>


<form method="post" action="index.php?action=addMember">
	<label for="pseudo">Pseudo</label><input type="text" id="pseudo" name="pseudo">
	<label for="mail">Adresse email</label><input type="text" id="mail" name="mail">
	<label for="password">Mot de passe</label><input type="password" id="password" name="password">
	<input type="submit" value="Créer un compte">
</form>

<?php $content= ob_get_clean(); ?>

<?php require ('template.php'); ?>