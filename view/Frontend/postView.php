<?php $post=$req->fetch(); ?>


<?php $title=$post['title'] ?>



<?php ob_start(); ?>

	<h1>Mon Super Blog</h1>

	<p><a href="index.php">Retour à la liste des billets</a></p>




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

            <?php 
            if(isset($_SESSION['pseudo'])){
            ?>

            <form method="post" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>">

                <div>
                    <label for="comment">Commentaire</label><br/>
                    <textarea id="comment" name="comment"></textarea>
                </div>

                <div>
                    <input type="submit" value="Envoyer">
                </div>

            </form>
           <?php
           }
           ?> 

    <?php
        if($comments->rowCount()==0){
            echo 'Soyez le premier à commenter cet article';
        }
        else{

        	while ($comment = $comments->fetch())
        	{

    ?>

            	<p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['date_commentaire_fr']; ?>
    <?php 
        if(isset($_SESSION['id'])){
    ?>
                <a href="index.php?action=signalComment&id=<?=$comment['id']?>&post=<?=$post['id']?>">(signaler)</a>
    <?php
        }
    ?>

    <?php
        if(isset($_SESSION['pseudo']) && $_SESSION['pseudo']==$comment['author']){
    ?>        
                <a href="index.php?action=modifyComment&id=<?= $comment['id']?>&post=<?=$post['id']?>&comment=<?=$comment['comment']?>">(Modifier)</a>
    <?php     
        }
    ?>

    <?php
        if(isset($_SESSION['id']) && $_SESSION['type']==1){
    ?>
                <a href="index.php?action=deleteComment&id=<?=$comment['id']?>&post=<?=$post['id']?>">(Supprimer)</a>
    <?php
        }
    ?>

            	<p><?php echo htmlspecialchars($comment['comment']); ?></p>

   	<?php
        	}
        }
   	?>


    
    <?php $content=ob_get_clean(); ?>

    <?php require('template.php'); ?>