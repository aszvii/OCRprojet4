<?php $title= 'Blog de Jean Forteroche'; ?>


<?php ob_start(); ?>

<section id="listPostsDiv">
	<h1> Billet Simple pour l'Alaska</h1>


<?php 

while($data=$req->fetch())
{
?>

		<div class="news">
			<a href="index.php?action=post&id=<?=$data['id']?>">
				<h3>
					<?= htmlspecialchars($data['title']); ?>
					<em>le <?= $data['date_creation_fr']; ?></em>
				</h3>
			</a>


			<div id="newsPara">
				<p><?=$postManager->cut($data['content'], $data['id']);?></p>
				
				<p><em><a href="index.php?action=post&id=<?=$data['id']?>">Commenter</a></em>

<?php 		if(isset($_SESSION) && isset($_SESSION['type'])){
				if($_SESSION['type']==1){

?>					<em><a id="modifLink" href="index.php?action=modifyPostPage&id=<?=$data['id']?>">Modifier</a></em>
					<em><a id="deleteLink" href="index.php?action=deletePost&id=<?=$data['id']?>">Supprimer</a></em></p>
<?php
				}
			}
?>


			</div>

		</div>
<?php	
}

$req->closeCursor();

?>

<?php if(isset($_SESSION) && isset($_SESSION['type'])){
		if($_SESSION['type']==1){

	?>

	<p id="addPostLink"><a href="index.php?action=addPost">Ajouter un billet</a></p>
<?php
}
}
?>
</section>
<?php $content= ob_get_clean(); ?>

<?php require ('template.php'); ?>
