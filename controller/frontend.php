<?php

require('model/frontend.php');

function listPosts(){
	$req=getPosts();

	require('view/Frontend/listPostsView.php');
}


function post(){

	$req= getPost($_GET['id']);
	$comments= getComments($_GET['id']);


	require('view/Frontend/postView.php');
}


function addComment($postId, $author, $comment){

	$req = postComment($postId, $author, $comment);

	if($req === false){
		die('Impossible d\'ajouter le commentaire !');
	}
	else{
		header('Location: index.php?action=post&id='. $postId);
	}
}