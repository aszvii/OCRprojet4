<?php $post=$req->fetch(); ?>


<?php $title=$post['title'] ?>



<?php ob_start(); ?>

	<h1>Mon Super Blog</h1>

	<p><a href="index.php">Retour à la liste des billets</a></p>


	<?php 

		if(!empty($post))
		{

	?>


			<div class="news">
            	<h3>
                	<?php echo htmlspecialchars($post['title']); ?>
               		<em>le <?php echo $post['date_creation_fr']; ?></em>
            	</h3>
            
            	<p>
                	<?php echo htmlspecialchars($post['content']); ?>
            	</p>
        	</div>

        	<h2>Commentaires</h2>

            <form method="post" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>">

                <div>
                    <label for="author">Auteur</label><br/>
                    <input type="text" id="author" name="author">
                </div>

                <div>
                    <label for="comment">Commentaire</label><br/>
                    <textarea id="comment" name="comment"></textarea>
                </div>

                <div>
                    <input type="submit" value="Envoyer">
                </div>

            </form>
            

    <?php
        	while ($comment = $comments->fetch())
        	{
    ?>

            	<p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['date_commentaire_fr']; ?></p>
            	<p><?php echo htmlspecialchars($comment['comment']); ?></p>

   	<?php
        	}
   	?>

    <?php 
		}
        else
        {
        	echo 'Aucun billet ne correspond à cet ID';
       	}

    ?>

    
    <?php $content=ob_get_clean(); ?>

    <?php require('template.php'); ?>