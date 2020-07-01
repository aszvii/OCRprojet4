<?php $title= 'Ajout d\'un billet'; ?>

<?php ob_start(); ?>

<section id="addModifPostDiv">

    <p><a href="index.php">Retour à l'accueil</a></p>
    <p><a href="index.php?action=admin">Retour à la page d'administration</a></p>

    <div>
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

<script type="text/javascript" src="tinymce/tinymce.js"></script>
<script type="text/javascript">
	   console.log("hello");
    tinyMCE.init({
        // type de mode
        mode : "standards", 
        // id ou class, des textareas appelés
        elements : "article", 
        // en mode avancé, cela permet de choisir les plugins
        theme : "advanced", 
        // langue
        language : "fr", 
        // liste des plugins
        theme_advanced_toolbar_location : "top",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,sup,forecolor,separator,"
        + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
        + "bullist,numlist,outdent,indent,separator,cleanup,|,undo,redo,|,",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        height:"250px",
        width:"600px"
    });
</script>

<?php $content= ob_get_clean(); ?>

<?php require ('view/backend/template2.php'); ?>