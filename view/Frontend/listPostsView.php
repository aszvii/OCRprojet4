<?php $title= 'Mon Blog'; ?>


<?php ob_start(); ?>


<h1> Mon Super Blog</h1>
<p>Derniers billets du blog</p>


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

?>					<em><a href="">Modifier</a></em>
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

	<p><a href="index.php?action=addPost">Ajouter un billet</a></p>
<?php
}
}
?>

<?php $content= ob_get_clean(); ?>

<?php require ('template.php'); ?>
