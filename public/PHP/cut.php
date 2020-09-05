<?php


function cutPost($post, $id){
        
    $max_caracteres=250;
        
    if (strlen($post)>$max_caracteres)
    {   
            
        $post = substr($post, 0, $max_caracteres);
            
        $position_space = strrpos($post, " ");   
        $post = substr($post, 0, $position_space); 

        $post= $post. " <a id='readMore' href='index.php?action=post&id=".$id."'>[Lire la suite]</a>";
    }

    return $post;
}




function cutComment($comment, $id, $commentId){
        
        $max_caracteres=250;
        
        if (strlen($comment)>$max_caracteres)
        {   
            
            $comment = substr($comment, 0, $max_caracteres);
            
            $position_space = strrpos($comment, " ");   
            $comment = substr($comment, 0, $position_space); 

            $comment= $comment. " <a id='readMore' href='index.php?action=post&id=".$id."#".$commentId."'>[Lire la suite]</a>";
        }
        
        return $comment;
    }