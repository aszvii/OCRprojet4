<form method="post" action="index.php?action=modifiedComment&id=<?=$_GET['id']?>&post=<?=$_GET['post']?>">

    <div>
        <label for="comment">Commentaire</label><br/>
        <textarea id="comment" name="comment"><?= $_GET['comment']?></textarea>
    </div>

    <div>
        <input type="submit" value="Modifier">
    </div>

</form>