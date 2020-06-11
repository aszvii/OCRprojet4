<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function listPosts(){

	$postManager = new \OCR\Blog\Model\PostManager();

	$req=$postManager->getPosts();

	if($req ===false){
		throw new Exception ('Impossible d\'afficher les billets');
	}
	else{

		require('view/Frontend/listPostsView.php');
	}
}


function post(){

	$postManager= new \OCR\Blog\Model\PostManager();

	$commentManager= new \OCR\Blog\Model\CommentManager();

	$req= $postManager->getPost($_GET['id']);


	$comments= $commentManager->getComments($_GET['id']);

	if($req===false || $comments===false){
		throw new Exception('Impossible d\'afficher la page');	
	}
	else if($req->rowCount()==0){
		throw new Exception('L\'id envoyé est incorrect');
	}
	else {
		require('view/Frontend/postView.php');
	}
	
}


function addComment($postId, $author, $comment){

	$commentManager=new  \OCR\Blog\Model\CommentManager();

	$req = $commentManager->postComment($postId, $author, $comment);

	if($req === false){
		throw new Exception ('Impossible d\'ajouter le commentaire !');
	}
	else{
		header('Location: index.php?action=post&id='. $postId);
	}
}