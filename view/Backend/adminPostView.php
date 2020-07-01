<?php $title= 'Liste des billets (admin)'; ?>


<?php ob_start(); ?>

<section id="adminPostsViewDiv">

	<p><a href="index.php?action=admin">Retour à la page d'administration</a></p>

	<h1>Liste des billets</h1>


	<table>
		<tr>
			<th>Date de création</th>
			<th>Titre</th>
			<th>Article</th>
			<th>Action</th>
		</tr>
<?php 

while($data=$req->fetch())
{
?>
		<tr>
			<td id="dateTable"><?php echo htmlspecialchars($data['date_creation_fr']); ?></td>
			<td><?php echo htmlspecialchars($data['title']); ?></td>
			<td><?php echo htmlspecialchars($data['content']); ?></td>

			<td id="actionSignalButton"><a id="adminModifPost" href="index.php?action=modifyPostPage&id=<?=$data['id']?>">Modifier</a>
									<a id="adminDeletePost" href="index.php?action=deletePost&id=<?=$data['id']?>">Supprimer</a>
									<a href="index.php?action=post&id=<?=$data['id']?>">Voir l'article</a>
			</td> 
		</tr>
	
<?php	
}

$req->closeCursor();

?>
	</table>

</section>

<?php $content= ob_get_clean(); ?>

<?php require ('view/Backend/template2.php'); ?>