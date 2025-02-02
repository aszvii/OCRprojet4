<?php require('public/PHP/cut.php');?>

<?php $title= 'Liste des billets (admin)'; ?>


<?php ob_start(); ?>

<section id="adminPostsViewDiv">

	<p class="returnLink"><a href="index.php">Retour à l'accueil</a></p>
	<p class="returnLink"><a href="index.php?action=admin">Retour à la page d'administration</a></p>

	<div id="listPostsAdminView">
		<h1>Liste des billets</h1>


		<table>
			<tr id="titleTr">
				<th id="dateTh">Date de création</th>
				<th id="titleTh">Titre</th>
				<th>Article</th>
				<th id="actionTh">Action</th>
			</tr>
<?php 

while($data=$req->fetch())
{
?>
			<tr>
				<td id="dateTable"><?php echo htmlspecialchars($data['date_creation_fr']); ?></td>
				<td id="titleTable"><?php echo htmlspecialchars($data['title']); ?></td>
				<td><?php echo cutPost($data['content'], $data['id']); ?></td>

				<td id="actionSignalButton"><a id="adminModifPost" href="index.php?action=modifyPostPage&id=<?=$data['id']?>">Modifier</a>
									<a id="adminDeletePost" href="index.php?action=deletePostAdmin&id=<?=$data['id']?>">Supprimer</a>
									<a href="index.php?action=post&id=<?=$data['id']?>">Voir l'article</a>
				</td> 
			</tr>
	
<?php	
}

$req->closeCursor();

?>
		</table>

	</div>

</section>

<?php $content= ob_get_clean(); ?>

<?php require ('view/Backend/template2.php'); ?>