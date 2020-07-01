<?php $title= 'Commentaires Signalés'; ?>


<?php ob_start(); ?>

<section id="signalComViewDiv">
<p><a href="index.php?action=admin">Retour à la page d'admninistration</a></p>

<h1> Commentaires signalés</h1>


<table>
	<tr>
		<th>Date</th>
		<th>Auteur</th>
		<th>Commentaire</th>
		<th>Action</th>
	</tr>
<?php 

while($data=$req->fetch())
{
?>
	<tr>
		<td id="dateTable"><?php echo htmlspecialchars($data['date_commentaire_fr']); ?></td>
		<td><?php echo htmlspecialchars($data['name']); ?></td>
		<td><?php echo htmlspecialchars($data['comment']); ?></td>

		<td id="actionSignalButton"><button id="deleteSignalCom"><a href="index.php?action=deleteComment&id=<?=$data['id']?>">Supprimer</a></button>
									<button id="cancelSignalCom"><a href="index.php?action=cancelSignal&id=<?=$data['id']?>">Annuler</a></button>
									<a id="signalCommentLink" href="index.php?action=post&id=<?=$data['post_id']?>">Voir le commentaire</a>
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
