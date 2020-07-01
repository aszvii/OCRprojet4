<?php

namespace OCR\Blog\Model;

require_once('model/Manager.php');

class CommentManager extends Manager
{

	public function getComments($postId){

		$db=$this->dbConnect();

		$comments =$db->prepare('SELECT comments.id, comments.post_id, comments.comment, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr, members.name FROM members INNER JOIN comments ON comments.member_id=members.id WHERE post_id=? ORDER BY comment_date');
		$comments->execute(array($postId));

		return $comments;
	}


	public function postComment($postId, $author, $comment){

		$db=$this->dbConnect();

		$req = $db->prepare('INSERT INTO comments (post_id, member_id, comment, comment_date) VALUES(?, ?, ?, NOW())');
   	 	$req->execute(array($postId, $author, $comment));

    	return $req;
	}



	public function modifyComment($comment, $commentId){

		$db=$this->dbConnect();

		$req=$db->prepare('UPDATE comments SET comment=? WHERE id=?');

		$req->execute(array($comment, $commentId));

		return $req;
	}



	public function signalComment($commentId){

		$db=$this->dbConnect();

		
		$req= $db->prepare('UPDATE comments SET signalment=1 WHERE id=?');

		$req->execute(array($commentId));

		return $req;

	}


	public function cancelSignal($commentId){

		$db=$this->dbConnect();

		
		$req= $db->prepare('UPDATE comments SET signalment=0 WHERE id=?');

		$req->execute(array($commentId));

		return $req;
	}


	public function showSignalComment(){

		$db=$this->dbConnect();

		$req=$db->query('SELECT comments.id, comments.post_id, comments.comment, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr, members.name FROM members INNER JOIN comments ON comments.member_id=members.id WHERE signalment=1');

		return $req;
	}



	public function deleteComment($commentId){

	$db=$this->dbConnect();

	$req=$db->prepare('DELETE FROM comments WHERE id=?');
	$req->execute(array($commentId));

	return $req;

	}

}