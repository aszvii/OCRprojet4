<?php $title= 'Ajouter un billet'; ?>

<?php ob_start(); ?>

<section id="addModifPostDiv">

    <p class="returnLink"><a href="index.php">Retour à l'accueil</a></p>
    <p class="returnLink"><a href="index.php?action=admin">Retour à la page d'administration</a></p>

    <div id=addModifTitle>
	   <h1>Ajouter un billet</h1>
    </div>

    <form method="post" action="index.php?action=addPosted">
	   <div>
		  <label for="title">Titre</label><input type="text" id="title" name="title">
	   </div>

	   <div>
		  <label for="article">Article</label><textarea id="article"  name="article" cols=50 rows=10></textarea>
	   </div>

	   <input type="submit" value="Publier">
	
    </form>

</section>


<?php $content= ob_get_clean(); ?>

<?php require ('view/backend/template2.php'); ?>