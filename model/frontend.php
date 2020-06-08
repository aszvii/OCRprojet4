<?php

function getPosts(){

	$db=dbConnect();

	$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY creation_date DESC LIMIT 0,5');

	return $req;

}

function getPost($postId){

	$db=dbConnect();

	$req= $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
	$req->execute(array($postId));
	
	return $req;

}

function getComments($postId){

	$db=dbConnect();

	$comments = $db->prepare('SELECT id, post_id, author, comment,  DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE post_id=? ORDER BY comment_date');
	$comments->execute(array($postId));

	return $comments;
}


function postComment($postId, $author, $comment){

	$db=dbConnect();

	$req = $db->prepare('INSERT INTO commentaires (post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $req->execute(array($postId, $author, $comment));

    return $req;
}


function dbConnect(){

	try{
		$db = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		return $db;
	}
	catch(Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

}


?>