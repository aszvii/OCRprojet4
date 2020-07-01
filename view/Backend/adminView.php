<?php $title= 'Page d\'administration'; ?>


<?php ob_start(); ?>

<section id="adminDiv">
	<section class="adminSection">
		<a href="index.php?action=addPost">
			<h2>AJOUTER UN BILLET</h2>
		</a>
	</section>

	<section class="adminSection">
		<a href="index.php?action=adminPost">
			<h2>MODIFIER OU SUPPRIMER UN BILLET</h2>
		</a>
	</section>

	<section class="adminSection">
		<a href="index.php?action=showSignalComment">
			<h2>GERER LES SIGNALEMENTS</h2>
		</a>
	</section>

	<section class="adminSection">
		<a href="index.php">
			<h2>RETOUR À LA PAGE PRINCIPALE</h2>
		</a>
	</section>
</section>

<?php $content= ob_get_clean(); ?>

<?php require ('view/Backend/template2.php'); ?>