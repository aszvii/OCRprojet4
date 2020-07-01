<?php $title= 'Mon Blog'; ?>


<?php ob_start(); ?>

<section id="listPostDiv">
	<h1> Billet Simple pour l'Alaska</h1>


<?php 

while($data=$req->fetch())
{
?>

		<div class="news">
			<h3>
				<?= htmlspecialchars($data['title']); ?>
				<em>le <?= $data['date_creation_fr']; ?></em>
			</h3>


			<p>
				<?= nl2br(htmlspecialchars($data['content'])); ?>
				<br/>
				<em><a href="index.php?action=post&id=<?=$data['id']?>">Commentaires</a></em>

<?php 		if(isset($_SESSION) && isset($_SESSION['type'])){
				if($_SESSION['type']==1){

?>					<em><a href="index.php?action=modifyPostPage&id=<?=$data['id']?>">Modifier</a></em>
					<em id="deleteCom"><a href="index.php?action=deletePost&id=<?=$data['id']?>">Supprimer</a></em>
<?php
				}
			}
?>


			</p>

		</div>
<?php	
}

$req->closeCursor();

?>

<?php if(isset($_SESSION) && isset($_SESSION['type'])){
		if($_SESSION['type']==1){

	?>

	<p><a id="addPostLink" href="index.php?action=addPost">Ajouter un billet</a></p>
<?php
}
}
?>
</section>
<?php $content= ob_get_clean(); ?>

<?php require ('template.php'); ?>
