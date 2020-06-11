<?php

namespace OCR\Blog\Model;

require_once('model/Manager.php');

class CommentManager extends Manager
{

	public function getComments($postId){

		$db=$this->dbConnect();

		$comments = $db->prepare('SELECT id, post_id, author, comment,  DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE post_id=? ORDER BY comment_date');
		$comments->execute(array($postId));

		return $comments;
	}


	public function postComment($postId, $author, $comment){

		$db=$this->dbConnect();

		$req = $db->prepare('INSERT INTO commentaires (post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
   	 	$req->execute(array($postId, $author, $comment));

    	return $req;
	}

}